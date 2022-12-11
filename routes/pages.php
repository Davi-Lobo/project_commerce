<?php

use \App\Http\Response;
use \App\Controller\Pages;
use \App\Controller\Pages\Admin;

$obRouter->get('/', [
    function() {
        return new Response(200, Pages\Home::getPageContent());
    }
]);

$obRouter->get('/category/{pageId}', [
    function($pageId) {
        return new Response(200, Pages\Category::getPageContent($pageId));
    }
]);

$obRouter->get('/product/{pageId}', [
    function($pageId) {
        return new Response(200, Pages\Product::getPageContent($pageId));
    }
]);

$obRouter->get('/admin/dashboard', [
    function() {
        return new Response(200, Admin\Dashboard::getPageContent());
    }
]);

$obRouter->get('/admin/product/add', [
    function() {
        return new Response(200, Admin\AddProduct::getPageContent());
    }
]);

$obRouter->post('/admin/product/add', [
    function($request) {
        return new Response(200, Admin\AddProduct::addProduct($request));
    }
]);

$obRouter->get('/admin/category/add', [
    function() {
        return new Response(200, Admin\AddCategory::getPageContent());
    }
]);

$obRouter->post('/admin/category/add', [
    function($request) {
        return new Response(200, Admin\AddCategory::addCategory($request));
    }
]);