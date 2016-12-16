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

namespace Vain\Core\Http\Context;

use Vain\Core\Http\Request\Proxy\HttpRequestProxyInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\Proxy\HttpResponseProxyInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class HttpContext
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HttpContext implements HttpContextInterface
{
    private $requestProxy;

    private $responseProxy;

    /**
     * AbstractContext constructor.
     *
     * @param HttpRequestProxyInterface  $requestProxy
     * @param HttpResponseProxyInterface $responseProxy
     */
    public function __construct(HttpRequestProxyInterface $requestProxy, HttpResponseProxyInterface $responseProxy)
    {
        $this->requestProxy = $requestProxy;
        $this->responseProxy = $responseProxy;
    }

    /**
     * @inheritDoc
     */
    public function getCurrentRequest() : VainServerRequestInterface
    {
        return $this->requestProxy->getCurrentRequest();
    }

    /**
     * @inheritDoc
     */
    public function getCurrentResponse() : VainResponseInterface
    {
        return $this->responseProxy->getCurrentResponse();
    }
}