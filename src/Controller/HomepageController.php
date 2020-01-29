<?php

namespace App\Controller;

use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;

class HomepageController extends AbstractController
{
    private function getPopIds() {
        $json = array_slice(json_decode(file_get_contents("https://api.themoviedb.org/3/trending/movie/week?api_key=7d43208d19a4ad654a8afdf455744183"), true)["results"], 0, 10);
        foreach ($json as $movie) {
            $result[] = $movie["id"];
        }
        return $result;
    }

    private function getRecIds() {
        //TODO: Recupere la liste des films vus par l'utilisateur
        $idArray = [512200];
        foreach ($idArray as $id) {
            $reco = array_slice(json_decode(file_get_contents("https://api.themoviedb.org/3/movie/".$id."/recommendations?api_key=7d43208d19a4ad654a8afdf455744183&language=fr-Fr&page=1"), true)["results"],0, 10);
            foreach ($reco as $movie) {
                $results[] = $movie["id"];
            }
        }
        return $results;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function getRecommended()
    {
        //TODO: Recuperer automatiquement la liste des ids des films recommandés
        //TODO: Recuperer automatiquement la liste des ids des films populaires pour les utilisateurs non connectés ou ceux n'ayant pas ajouté de films vus
        //TODO: Remplacer les images manquantes par un placeholder
        $idRec = $this->getRecIds();
        $idRec = [2, 3, 5, 6, 8, 9, 11, 12];

        //Recuperer les infos des films recommandes par leur id
        $movieRec = [];
        foreach ($idRec as $id) {
            $movieRec[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $id]);
        }

        $idPop = $this->getPopIds();
        $idPop = [2, 3, 5, 6, 8, 9, 11, 12];

        //Recuperer les infos des films populaires par leur id
        $moviePop = [];
        foreach ($idPop as $id) {
            $moviePop[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $id]);
        }

        $idLast = [2, 3, 5, 6, 8, 9, 11, 12];

        //Recuperer les infos des derniers films par leur id
        $movieLast = [];
        foreach ($idLast as $id) {
            $movieLast[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $id]);
        }


        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            "popular" => $moviePop,
            "recommended" => $movieRec,
            "last_watched" => $movieLast,
        ]);
    }
}