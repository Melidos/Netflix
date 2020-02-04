<?php

namespace App\Controller;

use App\Form\SearchFormType;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;

class HomepageController extends AbstractController
{
    private function getPopIds() {
        $json = array_slice(json_decode(file_get_contents("https://api.themoviedb.org/3/trending/movie/week?api_key=7d43208d19a4ad654a8afdf455744183"), true)["results"], 0, 3);
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

    private function getLatestIds() {
        return $this->getDoctrine()->getRepository(Movie::class)->find10OrderByCreatedAtDesc();
    }

    /**
     * @Route("/", name="homepage")
     */
    public function getRecommended()
        //TODO: Run GetMovieDbData command on launch
    {
        //TODO: Recuperer automatiquement la liste des ids des films recommandés
        //TODO: Creer une page contenant tous les films
        $idRec = $this->getRecIds();
        $idRec = [2, 3, 5, 6, 8, 9, 11, 12];

        //Recuperer les infos des films recommandes par leur id
        $movieRec = [];
        foreach ($idRec as $id) {
            $movieRec[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $id]);
        }

        $idPop = $this->getPopIds();
        //$idPop = [2, 3, 5, 6, 8, 9, 11, 12];

        //Recuperer les infos des films populaires par leur id
        $moviePop = [];
        foreach ($idPop as $id) {
            $moviePop[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $id]);
        }

        $idLast = [2, 3, 5, 6, 8, 9, 11, 12];
        $idLast = $this->getLatestIds();
        foreach ($idLast as $id) {
            $movieLast[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $id]);
        }

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            "popular" => $moviePop,
            "recommended" => $movieRec,
            "latest" => $movieLast,
        ]);
    }

    /**
     * @Route("/search/{name}", name="searchMovies")
     */
    public function searchForMovie() {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }

    /**
     * @Route("/all/{page}", name="allMovies", requirements={"page"="\d+"})
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allMovies(int $page) {
        //ini_set('memory_limit', '-1');
        $em = $this->getDoctrine()->getRepository(Movie::class);
        $movies = $em->find10OrderByTitle($page);

        $last_page = ceil($em->count([]) / 10);
        for ($i = ($page <= 3) ? 1 : $page - 2;
             $i < $page + 3;
             $i++)
            {
                $pages[] = $i;
            }
        return $this->render('homepage/all.html.twig', [
            'controller_name' => 'allMovies',
            'movies' => $movies,
            'pages' => $pages,
            'current_page' => $page,
            'last_page' => $last_page,
        ]);
    }
}