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

        $movie1 = new Movie();
        $movie2 = new Movie();
        $movie3 = new Movie();
        $movie4 = new Movie();
        $movie5 = new Movie();
        $movie6 = new Movie();
        $movie7 = new Movie();
        $movie8 = new Movie();

        $movie1->setTitle("Jumanji : Next Level");
        $movie1->setSynopsis("L’équipe est de retour, mais le jeu a changé. Alors qu’ils retournent dans Jumanji pour secourir l’un des leurs, ils découvrent un monde totalement inattendu. Des déserts arides aux montagnes enneigées, les joueurs vont devoir braver des espaces inconnus et inexplorés, afin de sortir du jeu le plus dangereux du monde...");
        $movie1->setReleaseDate(DateTime::createFromFormat("Y-m-d", "2019-12-04"));
        $movie1->setRuntime(114);
        $movie1->setMoviedbId(512200);
        $movie1->setPoster("/gNTip9ykUSPeAxx5GUnbrgP2QdD.jpg");
        $movie1->setBackground("/zTxHf9iIOCqRbxvl8W5QYKrsMLq.jpg");

        $movie2->setTitle("Ariel");
        $movie2->setSynopsis("Salla, petite ville minière de la Laponie. Taisto Kasurinen, mineur, hérite d'une \"belle américaine\" après le suicide de son propriétaire. Il retire toute ses économies de la banque et part à Helsinki. La capitale l'accueille froidement : il se fait voler son argent et se retrouve en prison. Cependant il a eu le temps de rencontrer Irmeli, jeune femme débordée, et son petit garçon. Ils réussiront a faire évader Taisto. Poursuivis par la police, ils sont bien décidés a tout faire pour s'en sortir.");
        $movie2->setReleaseDate(DateTime::createFromFormat("Y-m-d", "1988-10-21"));
        $movie2->setRuntime(72);
        $movie2->setMoviedbId(2);
        $movie2->setPoster("/gZCJZOn4l0Zj5hAxsMbxoS6CL0u.jpg");
        $movie2->setBackground("/z2QUexmccqrvw1kDMw3R8TxAh5E.jpg");

        $movie3->setTitle("Ombres au paradis");
        $movie3->setSynopsis("L'histoire d'amour d'un conducteur de camion a ordures, Nikander, et d'une caissiere de supermarche, Ilona. Un des rares films du nouveau cinema finlandais enfin sur nos ecrans");
        $movie3->setReleaseDate(DateTime::createFromFormat("Y-m-d", "1986-10-17"));
        $movie3->setRuntime(73);
        $movie3->setMoviedbId(3);
        $movie3->setPoster("/8zOzbURQB0Hh6tLaL9IcAkpPeKq.jpg");
        $movie3->setBackground("/6YjUX87VtIEuDzanBE6obVxE9V3.jpg");

        $movie4->setTitle("Groom service");
        $movie4->setSynopsis("Le groom d'un hôtel de luxe présente quatre histoires, se passant dans quatre chambres différentes. The missing ingredient : des sorcières tentent d'invoquer l'esprit de la déesse Diana. The wrong man : un homme armé séquestre sa femme. The misbehavers : un gangster, sa femme et ses deux enfants logent dans une chambre. The man from Hollywood : un acteur arrogant a organisé une fête");
        $movie4->setReleaseDate(DateTime::createFromFormat("Y-m-d", "1995-12-09"));
        $movie4->setRuntime(98);
        $movie4->setMoviedbId(5);
        $movie4->setPoster("/kQu88N4k5HmeNldfDBQutRo9k1d.jpg");
        $movie4->setBackground("/3EqYpbGCE9S5GddU2K4cYzP5UmI.jpg");

        $movie5->setTitle("La nuit du jugement");
        $movie5->setSynopsis("Quatre copains, voulant se rendre à un match de boxe, se retrouvent coincés dans des embouteillages sur l'autoroute. Pour arriver plus vite, ils prennent la première sortie et tentent de trouver un autre chemin pour arriver à temps au match. Mais ils trouvent coincés et sont témoins d'un meurtre affreux et brutal. Le tueur ne veut laisser aucune trace et décide donc de les tuer également");
        $movie5->setReleaseDate(DateTime::createFromFormat("Y-m-d", "1993-10-15"));
        $movie5->setRuntime(110);
        $movie5->setMoviedbId(6);
        $movie5->setPoster("/ml71KFhos8gaFIoRMXGoQ6SEn8M.jpg");
        $movie5->setBackground("/eXKgVIjLCFNpQkjVg1VpA8yM2GA.jpg");

        $movie6->setTitle("Life in Loops (A Megacities RMX)");
        $movie6->setSynopsis("Timo Novotny a remixé le film \"Megacities\" de Michael Glawoggers. 30% de la pellicule originale + 30% d’images coupées au montage par Glawoggers lui–même + 40% d’images réalisées au Japon pour l’occasion + une nouvelle bande-son extraordinaire. Une plongée en apnée au cœur des grandes capitales et leurs bas-fonds : violence urbaine, pauvreté, pénibilité au travail, sexe, culture underground… De New York à Tokyo en passant par Mexico, Moscou et Bombay");
        $movie6->setReleaseDate(DateTime::createFromFormat("Y-m-d", "2006-01-01"));
        $movie6->setRuntime(80);
        $movie6->setMoviedbId(8);
        $movie6->setPoster("/8YyIjOAxwzD3fZMdmJrfiApod4l.jpg");
        $movie6->setBackground("/udvB86uyzJ6P9vmB83WfrCbnmnI.jpg");

        $movie7->setTitle("La Guerre des étoiles");
        $movie7->setSynopsis("Il y a bien longtemps, dans une galaxie très lointaine... La guerre civile fait rage entre l'Empire galactique et l'Alliance rebelle. Capturée par les troupes de choc de l'Empereur menées par le sombre et impitoyable Dark Vador, la princesse Leia Organa dissimule les plans de l’Étoile Noire, une station spatiale invulnérable, à son droïde R2-D2 avec pour mission de les remettre au Jedi Obi-Wan Kenobi. Accompagné de son fidèle compagnon, le droïde de protocole C-3PO, R2-D2 s'échoue sur la planète Tatooine et termine sa quête chez le jeune Luke Skywalker. Rêvant de devenir pilote mais confiné aux travaux de la ferme, ce dernier se lance à la recherche de ce mystérieux Obi-Wan Kenobi, devenu ermite au cœur des montagnes désertiques de Tatooine");
        $movie7->setReleaseDate(DateTime::createFromFormat("Y-m-d", "1977-05-25"));
        $movie7->setRuntime(121);
        $movie7->setMoviedbId(11);
        $movie7->setPoster("/yVaQ34IvVDAZAWxScNdeIkaepDq.jpg");
        $movie7->setBackground("/4iJfYYoQzZcONB9hNzg0J0wWyPH.jpg");

        $movie8->setTitle("Le Monde de Nemo");
        $movie8->setSynopsis("Dans les eaux tropicales de la Grande Barrière de corail, un poisson-clown du nom de Marin mène une existence paisible avec son fils unique, Nemo. Redoutant l'océan et ses risques imprévisibles, il fait de son mieux pour protéger son fils. Comme tous les petits poissons de son âge, celui-ci rêve pourtant d'explorer les mystérieux récifs. Lorsque Nemo disparaît, Marin devient malgré lui le héros d'une quête unique et palpitante. Le pauvre papa ignore que son rejeton à écailles a été emmené jusque dans l'aquarium d'un dentiste. Marin ne s'engagera pas seul dans l'aventure : la jolie Dory, un poisson-chirurgien bleu à la mémoire défaillante et au grand cœur, va se révéler d'une aide précieuse. Les deux poissons vont affronter d'innombrables dangers, mais l'optimisme de Dory va pousser Marin à surmonter toutes ses peurs");
        $movie8->setReleaseDate(DateTime::createFromFormat("Y-m-d", "2003-05-30"));
        $movie8->setRuntime(101);
        $movie8->setMoviedbId(12);
        $movie8->setPoster("/8zR2vXoXfdlknEYjfHvCbb1rJbI.jpg");
        $movie8->setBackground("/2Vv4suw1ja7RpnR6FaXAOihI68g.jpg");

        foreach ([$movie1, $movie2, $movie3, $movie4, $movie5, $movie6, $movie7, $movie8] as $movie) {
        $manager->persist($movie);
    }

        $manager->flush();
    }
}
