<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::about');
$routes->get('/Recipes', 'Recipes::index');
$routes->get('/blog', 'Blog::index');
$routes->get('/single-blog', 'SingleBlog::index');
$routes->get('/contact', 'Contact::index');
