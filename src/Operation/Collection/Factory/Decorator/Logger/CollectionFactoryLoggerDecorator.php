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
declare(strict_types = 1);

namespace Vain\Core\Operation\Collection\Factory\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Id\Generator\IdGeneratorInterface;
use Vain\Core\Operation\Collection\Decorator\Logger\CollectionLoggerDecorator;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;
use Vain\Core\Operation\Collection\Factory\Decorator\AbstractOperationCollectionFactoryDecorator;

/**
 * Class DebugCollectionFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionFactoryLoggerDecorator extends AbstractOperationCollectionFactoryDecorator
{
    private $logger;

    private $idGenerator;

    /**
     * DebugCollectionFactoryDecorator constructor.
     *
     * @param LoggerInterface            $logger
     * @param IdGeneratorInterface       $idGenerator
     * @param OperationCollectionFactoryInterface $collectionFactory
     */
    public function __construct(
        OperationCollectionFactoryInterface $collectionFactory,
        LoggerInterface $logger,
        IdGeneratorInterface $idGenerator
    ) {
        $this->logger = $logger;
        $this->idGenerator = $idGenerator;
        parent::__construct($collectionFactory);
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
    public function create(array $operations = []) : OperationCollectionInterface
    {
        $collection = parent::create($operations);
        $id = $this->idGenerator->generate();
        $this->logger->debug(sprintf('Created collection %s with id %s', $collection->getName(), $id));

        return new CollectionLoggerDecorator($this->logger, $id, $collection);
    }
}
