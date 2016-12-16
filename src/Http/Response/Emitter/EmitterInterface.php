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

namespace Vain\Core\Http\Response\Emitter;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;

/**
 * Interface EmitterInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EmitterInterface
{
    /**
     * @param HttpResponseInterface $response
     *
     * @return EmitterInterface
     */
    public function send(HttpResponseInterface $response) : EmitterInterface;
}