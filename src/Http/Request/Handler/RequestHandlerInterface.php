<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */

namespace Vain\Core\Http\Request\Handler;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface RequestHandlerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RequestHandlerInterface
{
    /**
     * @param ServerRequestInterface $serverRequest
     *
     * @return mixed
     */
    public function handle(ServerRequestInterface $serverRequest);
}