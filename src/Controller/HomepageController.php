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
        $idArray = [18, 19, 20, 21, 22, 23, 24, 25];

        //Recuperer les infos des films recommandes par leur id
        $movieArr = [];
        foreach ($idArray as $id) {
            $movieArr[] = $this->getDoctrine()->getRepository(Movie::class)->find($id);
        }

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            "recommended" => $movieArr,
            "last_watched" => [
                [
                    "title" => "Jumanji : next level",
                    "poster" => "https://image.tmdb.org/t/p/w1280/kc62PCo8u5sZKq0crYvZSidLFPr.jpg",
                    "release_year" => 2019,
                    "id" => 1,
                ],
                [
                    "title" => "Star Wars : L'Ascension de Skywalker",
                    "poster" => "https://image.tmdb.org/t/p/w1280/w1fqnG3W2xqCPTvjdPJTcfPMYH1.jpg",
                    "release_year" => 2019,
                    "id" => 1,
                ],
                [
                    "title" => "Joker",
                    "poster" => "https://image.tmdb.org/t/p/w1280/tWjJ3ILjsbTwKgXxEv48QAbYZ19.jpg",
                    "release_year" => 2019,
                    "id" => 1,
                ],
                [
                    "title" => "Once Upon a Time… in Hollywood",
                    "poster" => "https://image.tmdb.org/t/p/w1280/oaxMobKQgpUbZI0WcNiSq6qRwyA.jpg",
                    "release_year" => 2019,
                    "id" => 1,
                ],
            ],
        ]);
    }
}