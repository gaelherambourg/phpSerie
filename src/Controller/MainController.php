<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController{

    public function home(){

    return $this->render('base.html.twig');

    }



}

