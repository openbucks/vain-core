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

namespace Vain\Core\Operation\Collection\Decorator\Event;

use Vain\Core\Event\Collection\CollectionEventDispatcherInterface;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\Collection\Decorator\AbstractOperationCollectionDecorator;
use Vain\Core\Result\ResultInterface;

/**
 * Class CollectionEventDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionEventDecorator extends AbstractOperationCollectionDecorator
{
    private $eventDispatcher;

    /**
     * EventCollectionDecorator constructor.
     *
     * @param OperationCollectionInterface       $collection
     * @param CollectionEventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        OperationCollectionInterface $collection,
        CollectionEventDispatcherInterface $eventDispatcher
    ) {
        $this->eventDispatcher = $eventDispatcher;
        parent::__construct($collection);
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        $this->eventDispatcher->start();

        $result = parent::execute();
        if (false !== $result->getStatus()) {
            $this->eventDispatcher->flush();
        }

        return $result;
    }

    /**
     * @return CollectionEventDispatcherInterface
     */
    public function getEventDispatcher() : CollectionEventDispatcherInterface
    {
        return $this->eventDispatcher;
    }
}
