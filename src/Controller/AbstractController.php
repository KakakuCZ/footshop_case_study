<?php

namespace App\Controller;

abstract class AbstractController
{
    protected $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render()
    {
        $template = $this->getName() . ".html";
        $data = array_merge(
            [
                'type' => $this->getName(),
            ],
            $this->getData()
        );

        echo $this->twig->render($template, $data);
    }

    abstract protected function getName();
    abstract protected function getData();
}
