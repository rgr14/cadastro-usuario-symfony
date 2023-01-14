<?php

namespace App\Controller\Api;

use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/api/v1", name="api_v1_")
 */
class UsuarioController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/usuario/listar", name="listar", methods={"GET"})
     */
    public function listar() : JsonResponse
    {
        $orm = $this->doctrine->getRepository(Usuario::class);
        var_dump($orm->findAll());
        return new JsonResponse($orm->findAll());
    }

    /**
     * @Route("/usuario/cadastrar", name="cadastrar", methods={"POST"})
     */
    public function cadastrar(Request $request) : Response
    {
        $data = $request->request->all();
        
        $usuario = new Usuario();
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);
        $usuario->setDataCadastro(new \DateTime());
        
        $orm = $this->doctrine->getManager();
        $orm->persist($usuario);
        $orm->flush();

        if($orm->contains($usuario))
        {
            return new Response("ok", 200);
        }
        else
        {
            return new Response("error", 404);
        }
    }
}