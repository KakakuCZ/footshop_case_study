<?php declare(strict_types=1);

namespace App\Model\Routing;

use App\Controller\AbstractController;
use App\Controller\ProductController;
use App\Controller\StatsController;

class Router
{
    private $twigEnvironment;

    public function __construct(\Twig_Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }

    public function navigate(?string $slug): void {
        $pageType = $this->getPageType($slug);
        $controller = $this->getController($pageType);

        $controller->render();
    }

    private function getPageType(?string $slug): string
    {
        if (!$slug) {
            $slug = 'products';
        }

        $pageType = Pages::ROUTES[$slug];

        if (!$pageType) {
            throw new \InvalidArgumentException('Error 404');
        }

        return $pageType;
    }

    private function getController(string $pageType): AbstractController {
        switch ($pageType) {
            case Pages::PRODUCT_LIST:
                return new ProductController($this->twigEnvironment);
            case Pages::STATS:
                return new StatsController($this->twigEnvironment);
            default:
                throw new \InvalidArgumentException('Error 404');
        }
    }
}
