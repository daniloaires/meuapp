<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    Router::defaultRouteClass(DashedRoute::class);

    Router::scope('/', function (RouteBuilder $routes) {
        // Rota para a página inicial
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    
        // Rota para o login
        $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    
        // Rota para o logout
        $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    
        // Rota para o controlador Clientes
        $routes->connect('/clientes', ['controller' => 'Clientes', 'action' => 'index']);
    
        // Conectar o resto das URLs do controlador 'Pages'
        $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    
        // Conectar rotas padrão para todos os controladores
        $routes->fallbacks(DashedRoute::class);
    });
};
