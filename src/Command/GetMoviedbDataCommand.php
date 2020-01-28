<?php

namespace App\Command;

use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\Movie;

class GetMovieDbDataCommand extends Command
{
    protected static $defaultName = 'GetMovieDbData';

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $movies = $this->em->getRepository(Movie::class)->findAll();
        foreach ($movies as $movie) {
            $movieIds[] = $movie->getMovieDbId();
        }

        $lastId = json_decode(file_get_contents("https://api.themoviedb.org/3/movie/latest?api_key=7d43208d19a4ad654a8afdf455744183&language=fr-FR"), true)["id"];

        for ($i = (isset($movieIds) ? max($movieIds) + 1 : 0); $i <= $lastId; $i++) {
            $movieJson = json_decode(@file_get_contents("https://api.themoviedb.org/3/movie/".$i."?api_key=7d43208d19a4ad654a8afdf455744183&language=fr-FR&append_to_response=fr-FR%2Cen-US%2Cnull"), true);
            if (isset($movieJson)) {
                print("id ".$i." traité ".$movieJson["title"].PHP_EOL);
                $movie = new Movie();
                $movie->setPoster($movieJson["poster_path"]);
                $movie->setReleaseDate(new DateTime($movieJson["release_date"]));
                $movie->setTitle($movieJson["title"]);
                $movie->setBackground($movieJson["backdrop_path"]);
                $movie->setMoviedbId($i);
                $movie->setRuntime($movieJson["runtime"]);
                $movie->setSynopsis($movieJson["overview"]);

                $this->em->persist($movie);
                $this->em->flush();
            }
            else {
                print("id ".$i." non présent".PHP_EOL);
            }
        }

        return 0;
    }
}
