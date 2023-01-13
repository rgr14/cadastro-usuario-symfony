<?php

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/v1", name="api_v1_")
 */
class UsuarioController
{
    /**
     * @Route("/usuario/listar", name="listar", methods={"GET"})
     */
    public function listar() : JsonResponse
    {
        return new JsonResponse([
            'nome' => 'João',
            'idade' => 20
        ]);
    }

    /**
     * @Route("/usuario/cadastrar", name="cadastrar", methods={"POST"})
     */
    public function cadastrar() : JsonResponse
    {
        return new JsonResponse([
            'nome' => 'João',
            'idade' => 20
        ]);
    }
}