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
                "background" => "https://image.tmdb.org/t/p/original/zTxHf9iIOCqRbxvl8W5QYKrsMLq.jpg",
                "title" => $movie->getTitle(),
                "release_date" => $movie->getReleaseDate(),
                "synopsis" => $movie->getSynopsis()
            ],
            "similar_movies" => [
                "1" => "https://image.tmdb.org/t/p/original/jyw8VKYEiM1UDzPB7NsisUgBeJ8.jpg",
                "Z" => "https://image.tmdb.org/t/p/original/jyw8VKYEiM1UDzPB7NsisUgBeJ8.jpg",
                "3" => "https://image.tmdb.org/t/p/original/jyw8VKYEiM1UDzPB7NsisUgBeJ8.jpg",
            ]
        ]);
    }
}