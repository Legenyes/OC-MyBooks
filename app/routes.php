<?php
/**
 * Created by PhpStorm.
 * User: Sebastien
 * Date: 18/12/2016
 * Time: 10:21
 */

// Home page
$app->get('/', function () use ($app) {
    $books = $app['dao.book']->findAll();
    return $app['twig']->render('index.html.twig', array('books' => $books));
})->bind('home');

// Book details with author
$app->get('/book/{id}', function ($id) use ($app) {
    $book = $app['dao.book']->find($id);
    return $app['twig']->render('book.html.twig', array('book' => $book));
})->bind('book');;