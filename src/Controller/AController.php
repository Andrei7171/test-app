<?php

namespace App\Controller;

use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AController extends AbstractController
{
    /**
     * @Route("/{name}", name="a")
     */
    public function index(string $name="switch"): Response
    {
        return $this->render('a/index.html.twig', [
            'name' => $name,
            'login'=> true,
        ]);
    }

/**
     * @Route("/a/a2", name="a2")
     */
    public function index2 (Request $request): Response
    {
        $name = $request->get('name', 'switch');
        $routePath = $this->container->get('router')->generate('a', ['name'=>$name]);
        
        return $this->render('a/index.html.twig', [
            'name' => $name,
            'routePath' => $routePath,
            'login'=>false]);
    }
}

