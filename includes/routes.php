<?php

function pizza_routes_definitions()
{
    return array(
        '/home' => array(
            'GET' => 'Controllers\HomeController::homePageAction',
        ),
        '/' => 'Controllers\HomeController::homePageAction',
        '/sauce' => array(
            'GET' => 'Controllers\SauceController::homeSaucePageAction',
        ),
        '/contact' => array(
            'GET' => 'Controllers\HomeController::contactPageAction',
        ),
        '/about' => array(
            'GET' => 'Controllers\HomeController::aboutPageAction',
        ),
        '/register' => array(
            'GET' => 'Controllers\UserAuthenticationController::registerPageAction',
            'POST' => 'Controllers\UserAuthenticationController::registerPost',
        ),
        '/login' => array(
            'GET' => 'Controllers\UserAuthenticationController::loginPageAction',
            'POST' => 'Controllers\UserAuthenticationController::loginPost',
        ),
        '/logout' => array(
            'GET' => 'Controllers\UserAuthenticationController::logoutPageAction',
        ),
        '/admin' => array(
            'GET' => 'Controllers\UserAuthenticationController::loginAdmin',
            'POST' => 'Controllers\UserAuthenticationController::loginPostAdmin',
        ),
        '/filter' => array(
            'GET' => 'Controllers\HomeController::filterAction',
        ),
        '/offer' => array(
            'GET' => 'Controllers\OfferController::showAction',
            'POST' => 'Controllers\OfferController::addToCartAction',
        ),
        '/pizza/{$id:([0-9]+)}' => 'Controllers\PizzaController::pizzaPageAction',
        '/sauce/{$id:([0-9]+)}' => 'Controllers\SauceController::saucePageAction',
        '/search' => array(
            'GET' => 'Controllers\PizzaController::searchPageAction',
        ),
        '/add-cart' => array(
            'POST' => 'Controllers\CartController::addToCart',
        ),
        '/cart' => 'Controllers\CartController::showCart',
        '/remove-from-cart/{$id:([0-9]+)}' => 'Controllers\CartController::removeFromCart',
        '/remove-offer-from-cart/{$id:([0-9]+)}' => 'Controllers\CartController::removeOfferFromCart',
        '/adminPage' => 'Controllers\PizzaController::adminPageAction',
        '/adminPage/pizza' => 'Controllers\PizzaController::adminPizzaAction',
        '/adminPage/sauce' => 'Controllers\SauceController::adminSauceAction',
        '/adminPage/pizza/add' => 'Controllers\PizzaController::addPizzaPage',
        '/adminPage/sauce/add' => 'Controllers\SauceController::addSaucePage',
        '/adminPage/history' => 'Controllers\PizzaController::adminHistoryAction',
        '/adminPage/pizza/update/{$id:([0-9]+)}' => array(
            'GET' => 'Controllers\PizzaController::updatePizzaPage',
            'POST' => 'Controllers\PizzaController::updatePizzaPage',
        ),
        '/adminPage/pizza/delete/{$id:([0-9]+)}' => array(
            'GET' => 'Controllers\PizzaController::deletePizzaPage',
            'POST' => 'Controllers\PizzaController::deletePizzaPage',
        ),
        '/adminPage/sauce/update/{$id:([0-9]+)}' => array(
            'GET' => 'Controllers\SauceController::updateSaucePage',
            'POST' => 'Controllers\SauceController::updateSaucePage',
        ),
        '/adminPage/sauce/delete/{$id:([0-9]+)}' => array(
            'GET' => 'Controllers\SauceController::deleteSaucePage',
            'POST' => 'Controllers\SauceController::deleteSaucePage',
        ),
        '/history' => 'Controllers\CartController::history',
    );
}

function pizza_routes_execute_handler()
{

    $routes = pizza_routes_definitions();
    $request_method = strtoupper($_SERVER['REQUEST_METHOD']);

    $controllerClass = FALSE;
    $controllerAction = 'get';
    $actionArguments = array();
    $regex_routes = array();

    foreach ($routes as $route_path => $route_definition) {
        $segments = explode('/', $route_path);
        foreach ($segments as $index => &$segment) {
            // We have a dynamic parameter.
            if (strpos($segment, '{') !== FALSE) {
                $segment = str_replace(array('{', '}'), array('', ''), $segment);
                $segment_parts = explode(':', $segment);
                $routes_arguments[$route_path][$segment_parts[0]] = $index;
                $segment = $segment_parts[1];
            }
        }
        $regex_path = implode('/', $segments);
        $regex_path = str_replace('/', '\/', $regex_path);
        $regex_routes[$regex_path]['definition'] = $route_definition;
        $regex_routes[$regex_path]['original_route'] = $route_path;
    }

    foreach ($regex_routes as $regex => $routeInfo) {
        $routeDefinition = $routeInfo['definition'];
        if (preg_match('/^' . $regex . '$/', $_GET['q'])) {
            if (is_array($routeDefinition) && isset($routeDefinition[$request_method])) {
                $routeParts = explode('::', $routeDefinition[$request_method]);

            } else {
                $routeParts = explode('::', $routeDefinition);
            }

            if (!empty($routeParts)) {
                $controllerClass = $routeParts[0];
                if (isset($routeParts[1])) {
                    $controllerAction = $routeParts[1];
                }
            }
            if (!empty($routes_arguments[$routeInfo['original_route']])) {
                $path_segments = explode('/', $_GET['q']);
                foreach ($routes_arguments[$routeInfo['original_route']] as $argument_name => $index) {
                    $actionArguments[$argument_name] = $path_segments[$index];
                }
            }
        }

    }

    if ($controllerClass) {
        $controller = new $controllerClass();
        call_user_func_array(array($controller, $controllerAction), $actionArguments);
    } else {
        echo '404 not found';
    }

}
