<?php

namespace App\controllers\Home;

use Humbrain\Framework\controllers\AbstractControllers;
use Humbrain\Framework\router\attributes\Route;
use Humbrain\Framework\router\Method;
use Humbrain\Framework\views\RendererInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends AbstractControllers
{
    const DEFINITIONS = null;
    private RendererInterface $renderer;

    public function __construct(ContainerInterface $container)
    {
        $this->renderer = $container->get(RendererInterface::class);
        $this->renderer->addPath('home', __DIR__ . '/views');
    }

    #[Route('/', Method::GET)]
    public final function index(ServerRequestInterface $request): string
    {
        return $this->renderer->render('@home/index', []);
    }
}