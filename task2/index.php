<?php

//вспомогательная функция
function build_url(array $parts) {
    return (isset($parts['scheme']) ? "{$parts['scheme']}:" : '') .
            ((isset($parts['user']) || isset($parts['host'])) ? '//' : '') .
            (isset($parts['user']) ? "{$parts['user']}" : '') .
            (isset($parts['pass']) ? ":{$parts['pass']}" : '') .
            (isset($parts['user']) ? '@' : '') .
            (isset($parts['host']) ? "{$parts['host']}" : '') .
            (isset($parts['port']) ? ":{$parts['port']}" : '') .
            (isset($parts['path']) ? "{$parts['path']}" : '') .
            (isset($parts['query']) ? "?{$parts['query']}" : '') .
            (isset($parts['fragment']) ? "#{$parts['fragment']}" : '');
}

function rewriteUrl(string $url) {
    $parse = parse_url($url);
    if (!array_key_exists("query", $parse) || !array_key_exists("path", $parse))
        return false;
    parse_str($parse['query'], $query);
    $query = array_filter($query, function($val) {
        return $val != 3;
    });
    asort($query);
    $query["url"] = $parse["path"];

    $parse["path"] = "/";
    $parse["query"] = http_build_query($query);

    return build_url($parse);
}

echo rewriteUrl('https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3');



