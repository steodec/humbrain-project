<?php

use App\controllers\Home\HomeController;
use GuzzleHttp\Psr7\ServerRequest;
use Humbrain\Framework\base\App;
use Humbrain\Framework\middleware\{DispatcherMiddleware, NotFoundMiddleware, RouteMiddleware};
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;
use function Http\Response\send;

require dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(dirname(__DIR__));
$dotenv->load();
$app = new App((dirname(__DIR__) . '/config/config.php'));
if ($_ENV['DEBUG']) :
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();
endif;
//<editor-fold desc="Controllers Section">
$app
    ->addModule(HomeController::class);
//</editor-fold>

//<editor-fold desc="Middleware section">
$app
    ->registerController()
    ->pipe(RouteMiddleware::class)
    ->pipe(DispatcherMiddleware::class)
    ->pipe(NotFoundMiddleware::class);
//</editor-fold>

$response = $app->run(ServerRequest::fromGlobals());
send($response);