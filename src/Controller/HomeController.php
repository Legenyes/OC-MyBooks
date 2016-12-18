<?php
/**
 * Created by PhpStorm.
 * User: Sebastien
 * Date: 18/12/2016
 * Time: 10:31
 */

namespace MyBooksCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class HomeController {

    /**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        $books = $app['dao.book']->findAll();
        return $app['twig']->render('index.html.twig', array('book' => $books));
    }

    /**
     * Book details controller.
     *
     * @param integer $id Book id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function bookAction($id, Request $request, Application $app) {
        $book = $app['dao.book']->find($id);

        return $app['twig']->render('book.html.twig', array(
            'book' => $book,));
    }

}
