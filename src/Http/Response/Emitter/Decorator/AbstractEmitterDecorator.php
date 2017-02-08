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

namespace Vain\Core\Http\Response\Emitter\Decorator;

use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use Vain\Core\Http\Response\Emitter\EmitterInterface;

/**
 * Class AbstractEmitterDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEmitterDecorator implements EmitterInterface
{
    private $emitter;

    /**
     * AbstractEmitterDecorator constructor.
     *
     * @param EmitterInterface $emitter
     */
    public function __construct(EmitterInterface $emitter)
    {
        $this->emitter = $emitter;
    }

    /**
     * @inheritDoc
     */
    public function send(HttpResponseInterface $response): EmitterInterface
    {
        $this->emitter->send($response);

        return $this;
    }
}