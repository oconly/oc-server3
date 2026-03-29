<?php

namespace Oc\Changelog\Controller;

use League\CommonMark\CommonMarkConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * @Route(service="Oc\Changelog\Controller\ChangelogController")
 */
class ChangelogController extends AbstractController
{
    /**
     * @var CommonMarkConverter
     */
    private CommonMarkConverter $markConverter;

    /**
     * @var Environment
     */
    private Environment $twig;

    public function __construct(CommonMarkConverter $markConverter, Environment $twig)
    {
        $this->markConverter = $markConverter;
        $this->twig = $twig;
    }

    /**
     * @Route(path="/changelog", name="changelog.index")
     */
    public function indexAction(): Response
    {
        $changelog = $this->markConverter
            ->convertToHtml(file_get_contents(__DIR__ . '/../../../../../ChangeLog-3.1.md'))->getContent();

        $response = new Response();
        $response->setContent(
            $this->twig->render(
                'changelog/index.html.twig',
                ['changelog' => $changelog]
            )
        );

        return $response;
    }
}
