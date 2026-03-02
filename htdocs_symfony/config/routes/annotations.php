<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routingConfigurator): void {
    $routingConfigurator->import('../../src/Controller/App', 'attribute')
        ->namePrefix('app_');

    $routingConfigurator->import('../../src/Controller/Backend', 'attribute')
            ->namePrefix('backend_')
            ->prefix('/backend');

//    $routingConfigurator->import('../../src/Controller/Admin', 'attribute')
//            ->namePrefix('admin_')
//            ->prefix('/admin');

    $routingConfigurator->import('../../src/Kernel.php', 'attribute');
};
