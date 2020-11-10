<?php

namespace App\Controller;

use App\Entity\Capitalize;
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
     * @Route("/", name="master")
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function index(Request $request): Response
    {
        $userInput = $request->get('input');
        $transform = new Capitalize();

        $logger = new Logger('Master');
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../../var/log/info.log', Logger::INFO));

        $master = new Master($transform, $logger, $userInput);
        $userInput = $master->getInput();
        return $this->render('master/index.html.twig', [
            'massage' => $userInput,
        ]);
    }


}
