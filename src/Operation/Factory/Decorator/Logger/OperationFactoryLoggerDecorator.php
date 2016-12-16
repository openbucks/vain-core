<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-operation
 */

namespace Vain\Core\Operation\Factory\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Id\Generator\IdGeneratorInterface;
use Vain\Core\Operation\Decorator\Logger\OperationLoggerDecorator;
use Vain\Core\Operation\Factory\Decorator\AbstractOperationFactoryDecorator;
use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class OperationFactoryLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationFactoryLoggerDecorator extends AbstractOperationFactoryDecorator
{
    private $logger;

    private $idGenerator;

    /**
     * OperationFactoryLoggerDecorator constructor.
     *
     * @param OperationFactoryInterface $operationFactory
     * @param LoggerInterface           $logger
     * @param IdGeneratorInterface      $idGenerator
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        LoggerInterface $logger,
        IdGeneratorInterface $idGenerator
    ) {
        $this->logger = $logger;
        $this->idGenerator = $idGenerator;
        parent::__construct($operationFactory);
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @return IdGeneratorInterface
     */
    public function getIdGenerator() : IdGeneratorInterface
    {
        return $this->idGenerator;
    }

    /**
     * @inheritDoc
     */
    public function decorate(OperationInterface $operation) : OperationInterface
    {
        $operation = parent::decorate($operation);
        $id = $this->idGenerator->generate();
        $this->logger->debug(sprintf('Created operation %s with id %s', $operation->getName(), $id));

        return new OperationLoggerDecorator($this->logger, $id, $operation);
    }

    /**
     * @inheritDoc
     */
    public function successful() : OperationInterface
    {
        return $this->decorate(parent::successful());
    }

    /**
     * @inheritDoc
     */
    public function failed() : OperationInterface
    {
        return $this->decorate(parent::failed());
    }
}
