<?php
namespace AppBundle\Handler;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Handler para revisar la autenticacion de usarios
 */
class AuthenticationHandler implements AuthenticationSuccessHandlerInterface//, AuthenticationFailureHandlerInterface
{
    private $router;
    private $container;
    private $em;
    
    /**
     * Constuctor de la clase
     * 
     * @param \Symfony\Bundle\FrameworkBundle\Routing\Router $router
     * @param type $container
     */
    public function __construct(Router $router,  $container)
    {
            $this->router = $router;
            $this->container = $container;
            $this->em = $this->container->get('doctrine')->getManager();
    }
    /**
     * Funcion que se ejecuta cuando  se autentica un usuario
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Symfony\Component\Security\Core\Authentication\Token\TokenInterface $token
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $usuario = $this->em->getRepository('AppBundle:User\User')->findOneById($token->getUser()->getId());
        if($usuario) {
            return new RedirectResponse($this->router->generate('home'));

        }
        else
        {
            return new RedirectResponse($this->router->generate('_login'));
        }
    }
}

