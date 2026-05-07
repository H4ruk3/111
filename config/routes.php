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

/*
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 */
/** @var \Cake\Routing\RouteBuilder $routes */
$routes->setRouteClass(DashedRoute::class);

$routes->prefix('Api', function (RouteBuilder $builder) {
    // All routes here will be prefixed with `/Admin`, and
    // have the `'prefix' => 'Admin'` route element added that
    // will be required when generating URLs for these routes
    $builder->connect('/trainingprogram/delete/{id}', ['controller' => 'Trainingprogram', 'action' => 'delete'])
        ->setPass(['id']);

    $builder->connect('/:controller/', ['action' => 'index']);
    $builder->connect('/:controller/:action/*', []);
    $builder->connect('/trainingprogram/add', ['controller' => 'Trainingprogram', 'action' => 'add']);
    $builder->connect('/trainingprogram/get/{id}', ['controller' => 'Trainingprogram', 'action' => 'get'])
        ->setPass(['id']);
    $builder->connect('/trainingprogram/copy/{id}', ['controller' => 'Trainingprogram', 'action' => 'copy'])
        ->setPass(['id']);
    $builder->connect('/trainingprogram/active/{id}', ['controller' => 'Trainingprogram', 'action' => 'active'])
        ->setPass(['id']);
    $builder->connect('/diary/get/{date}', ['controller' => 'Diary', 'action' => 'get'])
        ->setPass(['date']);
});

$routes->scope('/Api', function (RouteBuilder $builder) {
         // No $builder->applyMiddleware() here.

         // Parse specified extensions from URLs
         // $builder->setExtensions(['json', 'xml']);

        // Connect API actions here.
    });

$routes->scope('/', function (RouteBuilder $builder) {
    /*
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, templates/Pages/home.php)...
     */
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /*
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $builder->connect('/pages/*', 'Pages::display');

    $builder->connect('/programs/*', ['controller' => 'Programs', 'action' => 'index']);
    $builder->connect('/diary/*', ['controller' => 'Diary', 'action' => 'index']);

    $builder->connect('/users/register/{{id}}', ['controller' => 'Users', 'action' => 'register'])
        ->setPass(['id']);
    /*
     * Connect catchall routes for all controllers.
     *
     * The `fallbacks` method is a shortcut for
     *
     * ```
     * $builder->connect('/:controller', ['action' => 'index']);
     * $builder->connect('/:controller/:action/*', []);
     * ```
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $builder->fallbacks();
});

/*
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * $routes->scope('/Api', function (RouteBuilder $builder) {
 *     // No $builder->applyMiddleware() here.
 *
 *     // Parse specified extensions from URLs
 *     // $builder->setExtensions(['json', 'xml']);
 *
 *     // Connect API actions here.
 * });
 * ```
 */
