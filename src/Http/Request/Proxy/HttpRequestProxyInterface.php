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

namespace Vain\Core\Http\Request\Proxy;

use Vain\Core\Http\Request\VainServerRequestInterface;

/**
 * Interface HttpRequestProxyInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HttpRequestProxyInterface extends VainServerRequestInterface
{
    /**
     * @param VainServerRequestInterface $request
     *
     * @return HttpRequestProxyInterface
     */
    public function addRequest(VainServerRequestInterface $request) : HttpRequestProxyInterface;

    /**
     * @return VainServerRequestInterface
     */
    public function popRequest() : VainServerRequestInterface;

    /**
     * @return VainServerRequestInterface
     */
    public function getCurrentRequest() : VainServerRequestInterface;
}