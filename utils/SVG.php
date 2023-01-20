<?php

namespace utils;

use Exception;

class SVG
{
    public static function render(string $file, string $classes)
    {
        $filePath = 'public' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $file;

        if (!str_ends_with('.svg', $filePath)) {
            $filePath = $filePath . '.svg';
        }

        if (!file_exists($filePath)) {
            return null;
        }

        $content = file_get_contents($filePath);

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8" ?>' . $content);
        libxml_clear_errors();
        $svg = $dom->getElementsByTagName('svg');

        foreach ($svg as $item) {
            $item->setAttribute('class', $classes);
        }

        echo $dom->saveHTML();
    }
}