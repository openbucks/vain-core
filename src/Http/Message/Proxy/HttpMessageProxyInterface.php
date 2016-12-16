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

namespace Vain\Core\Http\Message\Proxy;

use Vain\Core\Http\Message\VainMessageInterface;

/**
 * Interface HttpMessageProxyInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HttpMessageProxyInterface extends VainMessageInterface
{
    /**
     * @param VainMessageInterface $message
     *
     * @return HttpMessageProxyInterface
     */
    public function addMessage(VainMessageInterface $message);

    /**
     * @return VainMessageInterface
     */
    public function popMessage();

    /**
     * @return VainMessageInterface
     */
    public function getCurrentMessage();
}