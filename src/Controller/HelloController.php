<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HelloController
{
    /**
     * @Route("/hello/{prenom<\D+>}", name="hello", methods={"GET", "POST"}, schemes={"https", "http"})
     */
    public function hello($prenom = "World", LoggerInterface $logger, Calculator $calculator, Slugify $slugify, Environment $twig)
    {
        dump($twig);
        dump($slugify->slugify("Hello World"));
        $logger->info("Mon message de log !");
        $tva = $calculator->calcul(100);
        dump($tva);
        return new Response("Hello $prenom");
    }
}
