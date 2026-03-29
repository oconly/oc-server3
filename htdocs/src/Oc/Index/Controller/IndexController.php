<?php

namespace Oc\Index\Controller;

use Oc\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(service="Oc\Index\Controller\IndexController")
 */
class IndexController extends AbstractController
{
    /**
     * @Route(path="", name="index.index")
     */
    public function indexAction(): Response
    {
        return new Response('test');
    }
}
