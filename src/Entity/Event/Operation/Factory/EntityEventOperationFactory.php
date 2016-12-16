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

namespace Vain\Core\Entity\Event\Operation\Factory;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Operation\Factory\Decorator\AbstractOperationFactoryDecorator;
use Vain\Core\Entity\Event\CreateEntityEvent;
use Vain\Core\Entity\Event\DeleteEntityEvent;
use Vain\Core\Entity\Event\UpdateEntityEvent;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Operation\EventOperation;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;
use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class EventOperationFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EntityEventOperationFactory extends AbstractOperationFactoryDecorator implements
    EntityEventOperationFactoryInterface
{
    private $resolver;

    private $collectionFactory;

    private $eventDispatcher;

    /**
     * EventOperationFactory constructor.
     *
     * @param OperationFactoryInterface           $operationFactory
     * @param EventResolverInterface                   $resolver
     * @param OperationCollectionFactoryInterface $collectionFactory
     * @param EventDispatcherInterface            $eventDispatcher
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        EventResolverInterface $resolver,
        EventDispatcherInterface $eventDispatcher,
        OperationCollectionFactoryInterface $collectionFactory
    ) {
        $this->resolver = $resolver;
        $this->collectionFactory = $collectionFactory;
        $this->eventDispatcher = $eventDispatcher;
        parent::__construct($operationFactory);
    }

    /**
     * @return EventResolverInterface
     */
    public function getResolver(): EventResolverInterface
    {
        return $this->resolver;
    }

    /**
     * @return OperationCollectionFactoryInterface
     */
    public function getCollectionFactory(): OperationCollectionFactoryInterface
    {
        return $this->collectionFactory;
    }

    /**
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * @inheritDoc
     */
    public function create(EntityInterface $entity) : OperationInterface
    {
        return $this->collectionFactory
            ->create()
            ->add(
                $this->decorate(
                    new EventOperation(
                        $this->eventDispatcher,
                        new CreateEntityEvent(
                            $this->resolver->createName(self::EVENT_GROUP_NAME, self::EVENT_CREATE_NAME),
                            $entity
                        )
                    )
                )
            )
            ->add(
                $this->decorate(
                    new EventOperation(
                        $this->eventDispatcher,
                        new CreateEntityEvent(
                            $this->resolver->createName($entity->getEntityName(), self::EVENT_CREATE_NAME),
                            $entity
                        )
                    )
                )
            );
    }

    /**
     * @inheritDoc
     */
    public function update(EntityInterface $newEntity, EntityInterface $oldEntity) : OperationInterface
    {
        return $this->collectionFactory
            ->create()
            ->add(
                $this->decorate(
                    new EventOperation(
                        $this->eventDispatcher,
                        new UpdateEntityEvent(
                            $this->resolver->createName(self::EVENT_GROUP_NAME, self::EVENT_UPDATE_NAME),
                            $newEntity,
                            $oldEntity
                        )
                    )
                )
            )
            ->add(
                $this->decorate(
                    new EventOperation(
                        $this->eventDispatcher,
                        new UpdateEntityEvent(
                            sprintf($this->resolver->createName($newEntity->getEntityName(), self::EVENT_UPDATE_NAME)),
                            $newEntity,
                            $oldEntity
                        )
                    )
                )
            );
    }

    /**
     * @inheritDoc
     */
    public function delete(EntityInterface $entity) : OperationInterface
    {
        return $this->collectionFactory
            ->create()
            ->add(
                $this->decorate(
                    new EventOperation(
                        $this->eventDispatcher,
                        new DeleteEntityEvent(
                            $this->resolver->createName(self::EVENT_GROUP_NAME, self::EVENT_DELETE_NAME),
                            $entity
                        )
                    )
                )
            )
            ->add(
                $this->decorate(
                    new EventOperation(
                        $this->eventDispatcher,
                        new DeleteEntityEvent(
                            sprintf($this->resolver->createName($entity->getEntityName(), self::EVENT_DELETE_NAME)),
                            $entity
                        )
                    )
                )
            );
    }
}
