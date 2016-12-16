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

namespace Vain\Core\Http\Event;

use Vain\Core\Event\EventInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Interface ResponseEventInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ResponseEventInterface extends EventInterface
{
    /**
     * @return VainResponseInterface
     */
    public function getResponse() : VainResponseInterface;
}