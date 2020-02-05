<?php

namespace App\Command;

use App\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DeleteNoOverviewNorBackdropCommand extends Command
{
    protected static $defaultName = 'DeleteNoOverviewNorBackdrop';

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
        ini_set('memory_limit', '-1');
        $movies = $this->em->getRepository(Movie::class)->findAll();
        foreach ($movies as $movie) {
            if ($movie->getSynopsis() == "" && $movie->getBackground() == "https://image.tmdb.org/t/p/original") {
                $moviesDelete[] = $movie;
            }
        }
        print ("Films ajoutes".PHP_EOL);
        $i = 0;
        $y = 0;
        foreach ($moviesDelete as $movie) {
            print($movie->getId()." - ".$movie->getTitle()." préparé".PHP_EOL);
            $this->em->remove($movie);
            $i++;
            $y++;
            if ($i >= 298) {
                $i = 0;
                print("Films préparés supprimés".PHP_EOL);
                print(count($moviesDelete) - $y." films restants".PHP_EOL);
                $this->em->flush();
            }
        }

        return 0;
    }
}
