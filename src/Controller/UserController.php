<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class UserController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername,
            'error' => $error,
            'controller_name' => 'UserController']);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }

    /**
     * @Route("/darkMode", name="darkMode")
     * @param Request $request
     * @return RedirectResponse
     */
    public function setDarkMode(Request $request) {
        $referer = $request->headers->get("referer");
        $oldCookie = $request->cookies->get("darkMode");
        if ($oldCookie) {
            $cookie = new Cookie('darkMode', "0");
        }
        else {
            $cookie = new Cookie('darkMode', "1");
        }

        //TODO: Redirect sur le referer et non pas la page d'accueil
        $response = new RedirectResponse($referer, "302");
        $response->headers->setCookie($cookie);

        return $response;
    }

    /**
     * @Route("/user/{username}", name="UserAccount")
     * @param string $username
     * @return Response
     */
    public function index(string $username) {
        //TODO: Ajouter un moyen de modifier les informations
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["username" => $username]);

        return $this->render("user/index.html.twig", [
            "user" => $user,
        ]);
    }

    /**
     * @Route("/user/{username}/movies", name="MoviesSeen")
     * @param string $username
     * @return Response
     */
    public function allMoviesSeen(string $username) {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(["username" => $username]);

        return $this->render("user/all.html.twig", [
            "movies" => (isset($user)) ? $user->getHasSeen() : [],
            "user" => $user,
        ]);
    }
}
