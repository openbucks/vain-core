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

namespace Vain\Core\Operation\Collection\Decorator;

use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\OperationInterface;
use Vain\Core\Result\ResultInterface;

/**
 * Class AbstractOperationCollectionDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractOperationCollectionDecorator implements OperationCollectionInterface
{
    private $collection;

    /**
     * AbstractVainOperationCollectionDecorator constructor.
     *
     * @param OperationCollectionInterface $collection
     */
    public function __construct(OperationCollectionInterface $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->collection->getName();
    }

    /**
     * @inheritDoc
     */
    public function add(OperationInterface $operation) : OperationCollectionInterface
    {
        $this->collection->add($operation);

        return $this;
    }

    /**
     * @return OperationCollectionInterface
     */
    public function getCollection() : OperationCollectionInterface
    {
        return $this->collection;
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        return $this->collection->execute();
    }
}
