<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-entity
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-entity
 */
declare(strict_types = 1);

namespace Vain\Core\Entity\Operation\Factory\Decorator\Event;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Entity\Event\Operation\Factory\EntityEventOperationFactoryInterface;
use Vain\Core\Entity\Operation\Factory\Decorator\AbstractEntityOperationFactoryDecorator;
use Vain\Core\Entity\Operation\Factory\EntityOperationFactoryInterface;
use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;
use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class EntityOperationFactoryEventDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EntityOperationFactoryEventDecorator extends AbstractEntityOperationFactoryDecorator
{
    private $eventFactory;

    private $collectionFactory;

    /**
     * OperationFactoryEventDecorator constructor.
     *
     * @param OperationFactoryInterface            $operationFactory
     * @param EntityOperationFactoryInterface      $eventOperationFactory
     * @param EntityEventOperationFactoryInterface $eventFactory
     * @param OperationCollectionFactoryInterface           $collectionFactory
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        EntityOperationFactoryInterface $eventOperationFactory,
        EntityEventOperationFactoryInterface $eventFactory,
        OperationCollectionFactoryInterface $collectionFactory
    ) {
        $this->eventFactory = $eventFactory;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($operationFactory, $eventOperationFactory);
    }

    /**
     * @return OperationCollectionFactoryInterface
     */
    public function getCollectionFactory() : OperationCollectionFactoryInterface
    {
        return $this->collectionFactory;
    }

    /**
     * @return EntityEventOperationFactoryInterface
     */
    public function getEventFactory() : EntityEventOperationFactoryInterface
    {
        return $this->eventFactory;
    }

    /**
     * @inheritDoc
     */
    public function createEntity(EntityInterface $entity) : OperationInterface
    {
        $operation = parent::createEntity($entity);

        return $this->collectionFactory
            ->create()
            ->add($operation)
            ->add($this->eventFactory->create($entity));
    }

    /**
     * @inheritDoc
     */
    public function doUpdateEntity(EntityInterface $newEntity, EntityInterface $oldEntity) : OperationInterface
    {
        $operation = parent::doUpdateEntity($newEntity, $oldEntity);

        return $this->collectionFactory
            ->create()
            ->add($operation)
            ->add($this->eventFactory->update($newEntity, $oldEntity));
    }

    /**
     * @inheritDoc
     */
    public function deleteEntity(EntityInterface $entity) : OperationInterface
    {
        $operation = parent::deleteEntity($entity);

        return $this->collectionFactory
            ->create()
            ->add($operation)
            ->add($this->eventFactory->delete($entity));
    }
}
