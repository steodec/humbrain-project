<?php

use Humbrain\Framework\router\Router;
use Humbrain\Framework\views\RendererInterface;
use Humbrain\Framework\views\TwigRendererFactory;
use function DI\create;
use function DI\factory;

return [
    "views.path" => dirname(__DIR__) . "/src/templates", // TEMPLATE VIEWS
    PDO::class => function () {
        $db_host = $_ENV["DB_{$_ENV['ENV']}_HOST_URL"];
        return new PDO($db_host, $_ENV["DB_{$_ENV['ENV']}_USER"], $_ENV["DB_{$_ENV['ENV']}_PASSWORD"]);
    }, // GENERATE PDO For ORM
    Router::class => create(), // CREATE ROUTER
    RendererInterface::class => factory(TwigRendererFactory::class), // CREATE RENDERER INTERFACE
];