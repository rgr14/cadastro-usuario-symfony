<?php

namespace App\Controller;

use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @Route("/", name="web_usuario_")
 */
class UsuarioController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

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
    public function salvar(Request $request)
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
            return $this->render("usuario/sucesso.html.twig");
        }
        else
        {
            return $this->render("usuario/erro.html.twig");
        }
    }
}