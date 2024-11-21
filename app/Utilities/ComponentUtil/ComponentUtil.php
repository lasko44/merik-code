<?php

namespace App\Utilities\ComponentUtil;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ComponentUtil
{
    private const PATH = "../resources/js/Shared/";

    public function getComponentDirectories(array $path = []): array
    {
        $directoryPath = self::buildPath($path);

        $directories = self::cleanDirectories(File::directories($directoryPath), $directoryPath);
        $files = self::getFiles($directoryPath);

        return array_merge($directories, $files);
    }

    public function getComponentContents(string $path): string
    {

        return File::get(self::PATH.$path);
    }

    private function buildPath(array $path): string
    {
        if ($path !== []) {
            $newPath = ComponentUtil::PATH;
            foreach ($path as $item) {
                $newPath = $newPath . $item;
            }
            return $newPath;
        }
        return ComponentUtil::PATH;
    }

    private static function cleanDirectories(array $directories, string $path): array
    {
        $cleaned = [];

        foreach ($directories as $item) {
            if (self::containsVueFiles($item)) {
                $strippedItem = Str::remove($path, $item);
                $cleaned[] = [
                    "name" => $strippedItem . "/",
                    "type" => "directory"
                ];
            }
        }
        return $cleaned;
    }

    private static function getFiles(string $path): array
    {
        $files = File::files($path);
        $mappedArray = array_map(function ($item) {
            return [
                "name" => $item->getBasename(),
                "type" => "file"
            ];
        }, $files);

        return array_filter($mappedArray, function ($item) {
            return Str::endsWith($item["name"], ".vue");
        });
    }

    private static function containsVueFiles($directory): bool
    {
        $files = File::files($directory);

        if (!isset($files)) {
            return false;
        }

        foreach ($files as $file) {
            if ($file->getExtension() === "vue") {
                return true;
            }
        }
        return false;
    }
}