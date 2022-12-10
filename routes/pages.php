<?php

use \App\Http\Response;
use \App\Controller\Pages;
use \App\Controller\Pages\Admin;

$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Home::getPageContent());
    }
]);

$obRouter->get('/product', [
    function() {
        return new Response(200, Admin\AddProduct::getPageContent());
    }
]);

$obRouter->post('/product', [
    function($request) {
        return new Response(200, Admin\AddProduct::addProduct($request));
    }
]);

$obRouter->get('/category', [
    function() {
        return new Response(200, Admin\AddCategory::getPageContent());
    }
]);

$obRouter->post('/category', [
    function($request) {
        return new Response(200, Admin\AddCategory::addCategory($request));
    }
]);

$obRouter->get('/page/{pageId}', [
    function($pageId) {
        return new Response(200, 'Página '. $pageId);
    }
]);