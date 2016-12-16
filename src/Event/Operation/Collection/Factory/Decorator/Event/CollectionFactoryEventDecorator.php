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

namespace Vain\Core\Event\Operation\Collection\Factory\Decorator\Event;

use Vain\Core\Event\Collection\CollectionEventDispatcherInterface;
use Vain\Core\Event\Operation\Collection\Decorator\Event\CollectionEventDecorator;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;
use Vain\Core\Operation\Collection\Factory\Decorator\AbstractOperationCollectionFactoryDecorator;

/**
 * Class CollectionFactoryEventDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionFactoryEventDecorator extends AbstractOperationCollectionFactoryDecorator
{
    private $eventDispatcher;

    /**
     * EventFactoryTransactionDecorator constructor.
     *
     * @param OperationCollectionFactoryInterface         $collectionFactory
     * @param CollectionEventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        OperationCollectionFactoryInterface $collectionFactory,
        CollectionEventDispatcherInterface $eventDispatcher
    ) {
        $this->eventDispatcher = $eventDispatcher;
        parent::__construct($collectionFactory);
    }

    /**
     * @return CollectionEventDispatcherInterface
     */
    public function getEventDispatcher() : CollectionEventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * @inheritDoc
     */
    public function create(array $operations = []) : OperationCollectionInterface
    {
        $collection = parent::create($operations);

        return new CollectionEventDecorator($collection, $this->eventDispatcher);
    }
}
