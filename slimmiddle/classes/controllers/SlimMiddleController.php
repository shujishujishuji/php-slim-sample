<?php
namespace htdocs\SlimMiddle\controllers;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class SlimMiddleController
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function middlewareTest(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
	{
        $content = "<p>ミドルウェアテスト。こちらはリクエスト処理。</p>";
		$responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
    }
}
