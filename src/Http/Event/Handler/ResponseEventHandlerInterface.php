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

namespace Vain\Core\Http\Event\Handler;

use Vain\Core\Event\Handler\EventHandlerInterface;
use Vain\Core\Http\Event\ResponseEventInterface;

/**
 * Interface ResponseEventHandlerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ResponseEventHandlerInterface extends EventHandlerInterface
{
    /**
     * @param ResponseEventInterface $response
     *
     * @return ResponseEventHandlerInterface
     */
    public function response(ResponseEventInterface $response) : ResponseEventHandlerInterface;
}