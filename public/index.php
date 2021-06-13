<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('/php-mvc-master/public/productdetail/addtocart', ['controller' => 'Cart', 'action' => 'addtocart']);
$router->add('/php-mvc-master/public/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/php-mvc-master/public/cart/cartdetail', ['controller' => 'Cart', 'action' => 'showcart']);
$router->add('/php-mvc-master/public/login', ['controller' => 'Home', 'action' => 'login']);
$router->add('/php-mvc-master/public/login/loging', ['controller' => 'Login', 'action' => 'loging']);
$router->add('/php-mvc-master/public/productdetail/{id:\d+}', ['controller' => 'Homeproductdetail', 'action' => 'getproduct']);
$router->dispatch($_SERVER['REQUEST_URI']);
