<?php

namespace utils;

class
Youtube
{
    public static function render(string $url, string $classes = ''): void
    {
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $url = $url_components['scheme'] . '://' . $url_components['host'] . '/embed/' . $params['v'];

        echo Template::render('views/components/youtube-video.php', ['url' => $url, 'classes' => $classes]);
    }
}