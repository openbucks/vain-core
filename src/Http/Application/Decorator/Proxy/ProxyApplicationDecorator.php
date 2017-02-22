<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-http
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-http
 */
declare(strict_types = 1);

namespace Vain\Core\Http\Application\Decorator\Proxy;

use Vain\Core\Http\Application\Decorator\AbstractHttpApplicationDecorator;
use Vain\Core\Http\Application\HttpApplicationInterface;
use Vain\Core\Http\Request\Proxy\HttpRequestProxyInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\Factory\ResponseFactoryInterface;
use Vain\Core\Http\Response\Proxy\HttpResponseProxyInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class ProxyApplicationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ProxyApplicationDecorator extends AbstractHttpApplicationDecorator
{
    private $requestProxy;

    private $responseProxy;

    private $responseFactory;

    /**
     * ProxyApplicationDecorator constructor.
     *
     * @param HttpApplicationInterface   $application
     * @param HttpRequestProxyInterface  $requestProxy
     * @param HttpResponseProxyInterface $responseProxy
     * @param ResponseFactoryInterface   $responseFactory
     */
    public function __construct(
        HttpApplicationInterface $application,
        HttpRequestProxyInterface $requestProxy,
        HttpResponseProxyInterface $responseProxy,
        ResponseFactoryInterface $responseFactory
    ) {
        $this->requestProxy = $requestProxy;
        $this->responseProxy = $responseProxy;
        $this->responseFactory = $responseFactory;
        parent::__construct($application);
    }

    /**
     * @inheritDoc
     */
    public function handleRequest(VainServerRequestInterface $request): VainResponseInterface
    {
        $this->requestProxy->addRequest($request);
        $this->responseProxy->addResponse($this->responseFactory->createResponse('php://temp'));

        $response = parent::handleRequest($request);

        $this->requestProxy->popRequest();
        $this->responseProxy->popResponse();


        return $response;
    }
}