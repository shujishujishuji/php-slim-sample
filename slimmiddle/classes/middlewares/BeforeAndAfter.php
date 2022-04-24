<?php
namespace htdocs\SlimMiddle\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class BeforeAndAfter implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
        print("<p>リクエスト処理前のミドルウェア</p>");

		$response = $handler->handle($request);

        $content = "<p>リクエスト処理後のミドルウェア</p>";

        $responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
}