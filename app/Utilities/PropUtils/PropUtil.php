<?php

namespace App\Utilities\PropUtils;

use App\Facades\ComponentUtil;
use Illuminate\Support\Facades\File;

class PropUtil
{

    public function inferVueComponentProps(string $path): array
    {
        $componentProps = $this->cleanComponentProps($path);
        return $this->mapProps($componentProps);
    }
    public function getCommonProps()
    {
        $jsonContents = File::get(base_path('app/Utilities/PropUtils/common.json'));
        return json_decode($jsonContents, true);
    }

    private function mapProps(array $componentProps): array
    {
        $commonProps = $this->getCommonProps();


        $props = [];
        foreach ($componentProps as  $prop) {
           $props[] = [
               'name' => $prop['name'],
               'type' => $commonProps[$prop['type']]['type'] ?? $prop['type'],
               'required' => $commonProps[$prop['type']]['required'] ?? false,
           ];
        }

        return $props;
    }

    private function cleanComponentProps(string $path): array
    {
        $contents = ComponentUtil::getComponentContents($path);
        // Match the content inside defineProps( ... )
        preg_match('/defineProps\s*\(\s*{\s*([^}]*)\s*}\s*\)/s', $contents, $matches);
        if (isset($matches[1])) {
            return $this->cleanPropData($matches[1]);
        }
        return [];
    }
    private function cleanPropData(string $contents): array
    {
        $propsContent = preg_replace('/\([^)]*\)/', '', $contents);
        return array_filter(array_map(function ($prop) {
            $cleanedProp = array_filter(array_map(function ($item) {
                return $item !== '' ? str_replace([" ", "\n"], '', $item) : null;
            }, explode(':', $prop)));
            return !empty($cleanedProp) ? [
                'name' => $cleanedProp[0] ?? null,
                'type' => $cleanedProp[1] ?? null
            ] : null;
        }, explode(',', $propsContent)));
    }
}