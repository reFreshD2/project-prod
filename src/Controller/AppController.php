<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class AppController extends AbstractController
{
    private $appEnv;
    private $appDebug;
    private $appSecret;

    public function __construct($appEnv,$appDebug,$appSecret)
    {
        $this->appEnv = $appEnv;
        $this->appDebug = $appDebug;
        $this->appSecret = $appSecret;
    }

    /**
     * @Route("/", name="app")
     */
    public function index()
    {
        $number = random_int(0,100);
        $data = array('env'=> $_ENV, 'my_num' => $number);
        if ($this->appDebug) {
            $data[] = ['my_secret' => $this->appSecret];
        }
        return new JsonResponse($data);
    }
}
