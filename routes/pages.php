<?php

use \App\Http\Response;
use \App\Controller\Pages;

// Rota Home
$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Home::getPageContent());
    }
]);

$obRouter->get('/product', [
    function() {
        return new Response(200, Pages\AddProduct::getPageContent());
    }
]);

$obRouter->post('/product', [
    function($request) {
        return new Response(200, Pages\AddProduct::getPageContent());
    }
]);

$obRouter->get('/page/{pageId}', [
    function($pageId) {
        return new Response(200, 'Página '. $pageId);
    }
]);