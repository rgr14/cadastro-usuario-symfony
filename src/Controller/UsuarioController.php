<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/", name="web_usuario_")
 */
class UsuarioController extends AbstractController
{
    /**
     * @Route("/",methods={"GET"}, name="index")
     */
    public function index() : Response
    {
        return $this->render("usuario/form.html.twig");
    }

    /**
     * @Route("/salvar",methods={"POST"}, name="salvar")
     */
    public function salvar()
    {
        return new Response("implementar", 200);
    }
}