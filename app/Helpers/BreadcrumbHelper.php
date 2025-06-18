<?php

namespace App\Helpers;

class BreadcrumbHelper
{
    public static function generateBreadcrumb($arr, $currentRoute)
    {
        $breadcrumb = [];
        self::findRoute($arr, $currentRoute, $breadcrumb);
        return $breadcrumb;
    }

    private static function findRoute($arr, $currentRoute, &$breadcrumb)
    {
        foreach ($arr as $item) {
            if ($item['route'] === $currentRoute) {
                $breadcrumb[] = $item;
                return true;
            }

            if (!empty($item['children'])) {
                $breadcrumb[] = $item;
                if (self::findRoute($item['children'], $currentRoute, $breadcrumb)) {
                    return true;
                }
                array_pop($breadcrumb);
            }
        }
        return false;
    }
}