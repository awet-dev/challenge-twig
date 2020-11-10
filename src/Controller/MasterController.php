<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Dashes;
use App\Entity\Master;
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterController extends AbstractController
{
    /**
     * @Route("/master", name="master")
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Request $request): Response
    {
        if ($request->get('input') && $request->get('class')) {
            $userInput = $request->get('input');

            if ($request->get('class') == 'Capitalize') {
                $transform = new Capitalize();
            } elseif($request->get('class') == 'Dashes') {
                $transform = new Dashes();
            }

            $logger = new Logger('Master');
            $logger->pushHandler(new StreamHandler(__DIR__ . '/../../var/log/info.log', Logger::INFO));

            $master = new Master($transform, $logger, $userInput);
            $userInput = $master->getInput();

            return $this->render('master/index.html.twig', [
                'massage' => $userInput,
            ]);

        } else {
            return $this->render('master/index.html.twig', [
                'massage' => "",
            ]);
        }
    }

    /**
    * @Route("/", name="homepage")
    */
    public function firstPage(): Response
    {
        return $this->render('master/homePage.html.twig', [
            'name' => 'LearningController'
        ]);
    }

}
