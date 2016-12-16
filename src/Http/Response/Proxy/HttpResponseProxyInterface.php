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

namespace Vain\Core\Http\Response\Proxy;

use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Interface HttpResponseProxyInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HttpResponseProxyInterface extends VainResponseInterface
{
    /**
     * @param VainResponseInterface $vainResponse
     *
     * @return HttpResponseProxyInterface
     */
    public function addResponse(VainResponseInterface $vainResponse);

    /**
     * @return VainResponseInterface
     */
    public function popResponse();

    /**
     * @return VainResponseInterface
     */
    public function getCurrentResponse();
}