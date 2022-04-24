<?php
namespace htdocs\SlimMiddle\middlewares;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Container\ContainerInterface;

class RecordIPAddressToLog implements MiddlewareInterface
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
        $serverParams = $request->getServerParams();
        $ipAddress = $serverParams["REMOTE_ADDR"];
        $path = $serverParams["REQUEST_URI"];
        $content = "<p>IPアドレスは".$ipAddress."でパスは".$path."</p>";
        $logger = $this->container->get("logger");
        $logger->info($content);
        $response = $handler->handle($request);
		return $response;
	}
}