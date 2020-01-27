<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie/{id}", name="movie")
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        $movie = $this->getDoctrine()->getRepository(Movie::class)->find($id);
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'info' => [
                "background" => $movie->getBackground(),
                "title" => $movie->getTitle(),
                "release_date" => $movie->getReleaseDate(),
                "synopsis" => $movie->getSynopsis()
            ],
            "similar_movies" => [
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