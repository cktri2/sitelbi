<?php
Trait Url
{
    protected function getRootPath($url)
    {
        $parts = parse_url($url);
        $elements = explode('/', $parts['path']);
        $len = sizeof($elements);
        for ($i = 0; $i < $len; $i++) {
            if ($elements[$i] === '..') {
                unset($elements[$i]);
                unset($elements[$i - 1]);
            }
        }
        return implode('/', $elements);
    }

}