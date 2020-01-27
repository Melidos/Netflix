<?php

namespace App\Controller;

use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function getRecommended()
    {
        //TODO: Recuperer automatiquement la liste des ids des films recommandés
        //TODO: Recuperer automatiquement la liste des ids des films populaires pour les utilisateurs non connectés ou ceux n'ayant pas ajouté de films vus
        $idRec = [18, 19, 20, 21, 22, 23, 24, 25];

        //Recuperer les infos des films recommandes par leur id
        $movieRec = [];
        foreach ($idRec as $id) {
            $movieRec[] = $this->getDoctrine()->getRepository(Movie::class)->find($id);
        }

        $idPop = [19, 20, 21, 22, 23, 24, 25];

        //Recuperer les infos des films recommandes par leur id
        $moviePop = [];
        foreach ($idPop as $id) {
            $moviePop[] = $this->getDoctrine()->getRepository(Movie::class)->find($id);
        }

        $idLast = [20, 21, 22, 23, 24, 25];

        //Recuperer les infos des films recommandes par leur id
        $movieLast = [];
        foreach ($idLast as $id) {
            $movieLast[] = $this->getDoctrine()->getRepository(Movie::class)->find($id);
        }


        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            "popular" => $moviePop,
            "recommended" => $movieRec,
            "last_watched" => $movieLast,
        ]);
    }
}