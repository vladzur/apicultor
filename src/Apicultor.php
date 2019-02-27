<?php

namespace Vladzur\Apicultor;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\ResponseFactory;
use League\Route\Strategy\JsonStrategy;
use League\Route\Router;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

/**
 * Apicultor Class
 * 
 * @category Class
 * @package  Apicultor
 * @author   Vladimir Zurita <vladzur@gmail.com>
 * @license  GPL sdsd
 * @link     sdssd
 */

class Apicultor
{
    public $router;
    public $request;

    /**
     * Constructor
     */
    public function __construct()
    {
        $responseFactory = new ResponseFactory;//new Http\Factory\Diactoros\ResponseFactory;
        $strategy = new JsonStrategy($responseFactory);
        $this->router = (new Router)->setStrategy($strategy);
        $this->request = ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }

    public function run()
    {
        $response = $this->router->dispatch($this->request);
        $emitter = new SapiEmitter;
        $emitter->emit($response);
    }
}