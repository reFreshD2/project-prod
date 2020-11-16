<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    private $appEnv;
    private $appDebug;
    private $appSecret;

    public function __construct($appEnv, $appDebug, $appSecret)
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
        $number = random_int(0, 100);
        $data = [];
        $data[] = ['env' => $this->appEnv, 'my_num' => $number];
        if ($this->appDebug) {
            $data[] = ['my_secret' => $this->appSecret];
        }

        return new JsonResponse($data);
    }
}
