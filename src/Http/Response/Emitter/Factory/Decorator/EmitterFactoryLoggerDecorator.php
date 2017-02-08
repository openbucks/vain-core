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

namespace Vain\Core\Http\Response\Emitter\Factory\Decorator;

use Psr\Log\LoggerInterface;
use Vain\Core\Http\Response\Emitter\Decorator\EmitterLoggerDecorator;
use Vain\Core\Http\Response\Emitter\EmitterInterface;
use Vain\Core\Http\Response\Emitter\Factory\EmitterFactoryInterface;

/**
 * Class EmitterFactoryLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EmitterFactoryLoggerDecorator extends AbstractEmitterFactoryDecorator
{
    private $logger;

    /**
     * EmitterFactoryLoggerDecorator constructor.
     *
     * @param EmitterFactoryInterface $emitterFactory
     * @param LoggerInterface         $logger
     */
    public function __construct(EmitterFactoryInterface $emitterFactory, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($emitterFactory);
    }

    /**
     * @inheritDoc
     */
    public function createEmitter(): EmitterInterface
    {
        return new EmitterLoggerDecorator(parent::createEmitter(), $this->logger);
    }
}