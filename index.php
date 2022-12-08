<?php

require __DIR__.'/includes/app.php';

use \App\Http\Router;

// Starts the Router
$obRouter = new Router(getenv('BASE_URL'));

// Includes all app routes
include __DIR__.'/routes/pages.php';

// Prints the route response
$obRouter->run()->sendResponse();