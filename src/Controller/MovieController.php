<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;
use App\Entity\User;
use Symfony\Component\Security\Core\Security;

class MovieController extends AbstractController
//TODO: Ajouter une fonction de recherche
//TODO: Ajouter une fonction pour afficher tous les films page par page
//TODO: Ajouter une fonction de tri sur les pages contenant tous les films.
{
    private function getSimIds(int $id) {
        //TODO: Recupere la liste des films similaires
        $reco = array_slice(json_decode(file_get_contents("https://api.themoviedb.org/3/movie/".$id."/recommendations?api_key=7d43208d19a4ad654a8afdf455744183&language=fr-FR&page=1"), true)["results"],0, 10);
        foreach ($reco as $movie) {
            $results[] = $movie["id"];
        }
        return isset($results) ? $results : [];
    }

    /**
     * @Route("/movie/add/{id}", name="movie_has_seen")
     * @param Security $security
     * @param int $id
     * @return RedirectResponse
     */
    public function addToHasSeen(Security $security, int $id) {
        $user = $security->getUser();
        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);

        //TODO: Ajouter un moyen d'ajouter un film vu et un film a voir
        $user->addHasSeen($movie);

        return $this->redirectToRoute("movie", ["id" => $id]);
    }

    /**
     * @Route("/movie/{id}", name="movie")
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);

        $idList = $this->getSimIds($movie->getMoviedbId());

        //Recuperer les infos des films recommandes par leur id
        $movieList = [];
        foreach ($idList as $i) {
            $movieList[] = $this->getDoctrine()->getRepository(Movie::class)->findOneBy(["moviedb_id" => $i]);
        }
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'info' => [
                "id" => $id,
                "background" => $movie->getBackground(),
                "title" => $movie->getTitle(),
                "release_date" => $movie->getReleaseDate(),
                "synopsis" => $movie->getSynopsis()
            ],
            "similar_movies" => $movieList,
        ]);
    }
}