<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        dd("Ça fonctionne");
    }

    /**
     * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, schemes={"https", "http"})
     */
    public function test($age)
    {
        return new Response("Vous avez $age ans !");
    }
}
