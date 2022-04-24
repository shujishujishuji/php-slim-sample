<?php
namespace htdocs\SlimMiddle\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class RecordIPAddress implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		$response = $handler->handle($request);
        $serverParams = $request->getServerParams();
        $ipAddress = $serverParams["REMOTE_ADDR"];
        $path = $serverParams["REQUEST_URI"];
        $content = "<p>IPアドレスは".$ipAddress."でパスは".$path."</p>";
        $responseBody = $response->getBody();
		$responseBody->write($content);
		return $response;
	}
}