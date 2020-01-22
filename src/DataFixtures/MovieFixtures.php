<?php

namespace App\DataFixtures;

use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $movie = new Movie();

        $movie->setTitle("Jumanji : Next Level");
        $movie->setSynopsis("L’équipe est de retour, mais le jeu a changé. Alors qu’ils retournent dans Jumanji pour secourir l’un des leurs, ils découvrent un monde totalement inattendu. Des déserts arides aux montagnes enneigées, les joueurs vont devoir braver des espaces inconnus et inexplorés, afin de sortir du jeu le plus dangereux du monde...");
        $movie->setReleaseDate(DateTime::createFromFormat("Y-m-d", "2019-12-04"));
        $movie->setRuntime(114);
        $movie->setMoviedbId(512200);

        $manager->persist($movie);
        $manager->flush();
    }
}
