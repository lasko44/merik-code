<?php

namespace App\Utilities;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ComponentUtil
{
    private const PATH = "../resources/js/Shared/";

    public static function getComponentDirectories(array $path = []): array
    {
        $directoryPath = self::buildPath($path);

        $directories = self::cleanDirectories(File::directories($directoryPath),$directoryPath);
        $files = self::getFiles($directoryPath);

        return array_merge($directories, $files);
    }

    private static function buildPath(array $path): string
    {
        if ($path !== []) {
           $newPath = ComponentUtil::PATH;
           foreach ($path as $item){
               $newPath = $newPath.$item;
           }
            return $newPath;
        }
        return ComponentUtil::PATH;
    }

    private static function cleanDirectories(array $directories, string $path): array
    {

        $cleaned = [];
        foreach ($directories as $item) {
            $strippedItem = Str::remove($path, $item);
            if ($strippedItem !== "Utils/") {
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
        return array_map(function ($item) {
            return [
                "name" => $item->getBasename(),
                "type" => "file"
            ];
        }, $files);
    }
}