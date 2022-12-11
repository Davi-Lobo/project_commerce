<?php

namespace App\Controller\Pages\Admin;

use \App\Utils\View;

class Admin {

    /**
     * Returns header layout
     *
     * @return string
     */
    private static function getHeader() {
        return View::render('pages/admin/header');
    }
    
    
    /**
     * Returns the default page content
     * 
     * @return string
     */
    public static function getPage($class, $title, $content) {
        return View::render('pages/admin/page', [
            'title' => $title,
            'bodyclass' => $class,
            'header' => self::getHeader(),
            'content' => $content
        ]);
    }
}