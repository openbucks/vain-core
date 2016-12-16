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

namespace Vain\Core\Operation\Collection\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Operation\Collection\Decorator\AbstractOperationCollectionDecorator;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\OperationInterface;
use Vain\Core\Result\ResultInterface;

/**
 * Class LoggerCollectionDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionLoggerDecorator extends AbstractOperationCollectionDecorator
{
    private $logger;

    private $id;

    /**
     * VainOperationCollectionLoggerDecorator constructor.
     *
     * @param LoggerInterface $logger
     * @param string $id
     * @param OperationCollectionInterface $collection
     */
    public function __construct(LoggerInterface $logger, string $id, OperationCollectionInterface $collection)
    {
        $this->logger = $logger;
        $this->id = $id;
        parent::__construct($collection);
    }

    /**
     * @inheritDoc
     */
    public function add(OperationInterface $operation) : OperationCollectionInterface
    {
        $this->logger->debug(
            sprintf(
                'Adding operation %s with to collection %s with id %s',
                $operation->getName(),
                $this->getName(),
                $this->id
            )
        );
        parent::add($operation);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        $this->logger->debug(sprintf('Ready to execute collection %s with id %s', $this->getName(), $this->id));
        $result = parent::execute();
        if (false === $result->getStatus()) {
            $this->logger->debug(sprintf('Failed to execute collection %s with id %s', $this->getName(), $this->id));
        } else {
            $this->logger->debug(
                sprintf('Successfully executed collection %s with id %s', $this->getName(), $this->id)
            );
        }

        return $result;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }
}
