<?php declare(strict_types=1);

namespace App\Model\Routing;

class Pages
{
    public const PRODUCT_LIST = 'PRODUCT_LIST';
    public const STATS = 'STATS';

    public const ROUTES = [
        'products' => self::PRODUCT_LIST,
        'stats' => self::STATS,
    ];
}
