<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ExpressionLanguage\Expression;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DefaultController extends AbstractController
{
    #[Route(path: '/')]
    #[IsGranted(new Expression('true'))]
    public function index(): Response
    {
        return new Response('<!doctype html><html><head><meta charset="utf-8"><title></title></head><body></body></html>');
    }
}
