<?php

namespace App\Controller;

use App\Entity\Serie;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
   
    /**
     * @Route("/", name="home")
     */
    public function home(){

        $serieRepo = $this->getDoctrine()->getRepository(Serie::class);

        $series = $serieRepo->findSerieByPopularity();

        dump($series);

        return $this->render('accueil/home.html.twig', [
            "series"=> $series
        ]);

    }

    /**
     * @Route("/detail/{id}", name="detailSerie")
     */
    public function detailSerie(int $id){


        $serieRepo = $this->getDoctrine()->getRepository(Serie::class);

        $serie = $serieRepo->find($id);

        if(!$serie){
            throw $this->createNotFoundException('Cette série n\'existe pas.');
        }

        dump($serie);


        return $this->render('serie/detailSerie.html.twig', [
            "serie"=> $serie
        ]);
    
    }

}
