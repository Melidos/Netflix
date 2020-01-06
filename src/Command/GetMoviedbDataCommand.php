<?php

namespace App\Command;

use App\Entity\Movie;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GetMoviedbDataCommand extends Command
{
    protected static $defaultName = 'GetMoviedbData';

    private $container;

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        /*
        $entityManager = $this->container->get('doctrine')->getManager();

        $result = $this->container->get('doctrine')->getRepository(Movie::class)->findAll();

        foreach ($result as $key => $value) {
            echo($value->getMoviedbid());
        }
        */


        for ($i=intval($arg1); $i<=659682; $i+=1) {
            echo("Processing id ".$i." / 659682\n");
            try {
                //TODO : arrayOfId = $movie->getMovieDbId()
                $data = json_decode(@file_get_contents('https://api.themoviedb.org/3/movie/'.$i.'?api_key=7d43208d19a4ad654a8afdf455744183&language=fr-FR'));

                if (strpos($http_response_header[0], "404") != false || strpos($http_response_header[0], "502") != false) {
                    continue;
                }
                else {
                    $entityManager = $this->container->get('doctrine')->getManager();
                    
                    $movie = new Movie();

                    $name = ($data->title) ? $data->title : $data->original_title ;
                    
                    $movie->setName($name);
                    
                    $movie->setYear($data->release_date);
                    $movie->setSynopsis($data->overview);
                    $movie->setCover('image.tmdb.org/t/p/original'.$data->poster_path);
                    $movie->setBackground('image.tmdb.org/t/p/original'.$data->backdrop_path);
                    $movie->setMoviedbid($i);

                    $entityManager->persist($movie);

                    $entityManager->flush();
                }   
            } catch (Exception $e) {
                echo("Error" + $e);
            }
        }
        return 0;
    }
}