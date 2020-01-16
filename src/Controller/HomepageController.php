<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            "recommended" => [
                [
                    "title" => "Jumanji : next level",
                    "poster" => "https://image.tmdb.org/t/p/w1280/kc62PCo8u5sZKq0crYvZSidLFPr.jpg",
                    "synopsis" => "L’équipe est de retour, mais le jeu a changé. Alors qu’ils retournent dans Jumanji pour secourir l’un des leurs, ils découvrent un monde totalement inattendu. Des déserts arides aux montagnes enneigées, les joueurs vont devoir braver des espaces inconnus et inexplorés, afin de sortir du jeu le plus dangereux du monde...",
                ],
                [
                    "title" => "Star Wars : L'Ascension de Skywalker",
                    "poster" => "https://image.tmdb.org/t/p/w1280/w1fqnG3W2xqCPTvjdPJTcfPMYH1.jpg",
                    "synopsis" => "La conclusion de la saga Skywalker. De nouvelles légendes vont naître dans cette bataille épique pour la liberté.",
                ],
                [
                    "title" => "Joker",
                    "poster" => "https://image.tmdb.org/t/p/w1280/tWjJ3ILjsbTwKgXxEv48QAbYZ19.jpg",
                    "synopsis" => "Dans les années 1980, à Gotham City, Arthur Fleck, un humoriste de stand-up raté, bascule dans la folie et devient le Joker.",
                ],
                [
                    "title" => "Once Upon a Time… in Hollywood",
                    "poster" => "https://image.tmdb.org/t/p/w1280/oaxMobKQgpUbZI0WcNiSq6qRwyA.jpg",
                    "synopsis" => "En 1969, Rick Dalton – star déclinante d'une série télévisée de western – et Cliff Booth – sa doublure de toujours – assistent à la métamorphose artistique d'un Hollywood qu'ils ne reconnaissent plus du tout en essayant de relancer leurs carrières. De plus, en plein été, le 9 août, Hollywood sera à jamais marqué par un fait divers barbare : l'assassinat de l'actrice Sharon Tate enceinte de 8 mois, épouse du cinéaste franco-polonais Roman Polanski et voisine de Rick Dalton, ainsi que de ses amis dans sa villa, par les disciples du gourou Charles Manson.",
                ],
            ],
            "last_watched" => [
                [
                    "title" => "Jumanji : next level",
                    "poster" => "https://image.tmdb.org/t/p/w1280/kc62PCo8u5sZKq0crYvZSidLFPr.jpg",
                    "synopsis" => "L’équipe est de retour, mais le jeu a changé. Alors qu’ils retournent dans Jumanji pour secourir l’un des leurs, ils découvrent un monde totalement inattendu. Des déserts arides aux montagnes enneigées, les joueurs vont devoir braver des espaces inconnus et inexplorés, afin de sortir du jeu le plus dangereux du monde...",
                ],
                [
                    "title" => "Star Wars : L'Ascension de Skywalker",
                    "poster" => "https://image.tmdb.org/t/p/w1280/w1fqnG3W2xqCPTvjdPJTcfPMYH1.jpg",
                    "synopsis" => "La conclusion de la saga Skywalker. De nouvelles légendes vont naître dans cette bataille épique pour la liberté.",
                ],
                [
                    "title" => "Joker",
                    "poster" => "https://image.tmdb.org/t/p/w1280/tWjJ3ILjsbTwKgXxEv48QAbYZ19.jpg",
                    "synopsis" => "Dans les années 1980, à Gotham City, Arthur Fleck, un humoriste de stand-up raté, bascule dans la folie et devient le Joker.",
                ],
                [
                    "title" => "Once Upon a Time… in Hollywood",
                    "poster" => "https://image.tmdb.org/t/p/w1280/oaxMobKQgpUbZI0WcNiSq6qRwyA.jpg",
                    "synopsis" => "En 1969, Rick Dalton – star déclinante d'une série télévisée de western – et Cliff Booth – sa doublure de toujours – assistent à la métamorphose artistique d'un Hollywood qu'ils ne reconnaissent plus du tout en essayant de relancer leurs carrières. De plus, en plein été, le 9 août, Hollywood sera à jamais marqué par un fait divers barbare : l'assassinat de l'actrice Sharon Tate enceinte de 8 mois, épouse du cinéaste franco-polonais Roman Polanski et voisine de Rick Dalton, ainsi que de ses amis dans sa villa, par les disciples du gourou Charles Manson.",
                ],
            ],
        ]);
    }
}