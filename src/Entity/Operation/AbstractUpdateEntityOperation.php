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

namespace Vain\Core\Entity\Operation;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Entity\Event\UpdateEntityEvent;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\FailedResult;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class AbstractUpdateEntityOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractUpdateEntityOperation extends AbstractOperation
{
    private $eventResolver;

    private $eventDispatcher;

    /**
     * AbstractCreateEntityOperation constructor.
     *
     * @param EventResolverInterface   $eventResolver
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventResolverInterface $eventResolver, EventDispatcherInterface $eventDispatcher)
    {
        $this->eventResolver = $eventResolver;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return EntityInterface
     */
    abstract public function findEntity() : EntityInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return EntityInterface
     */
    abstract public function updateEntity(EntityInterface $entity) : EntityInterface;

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (null === ($oldEntity = $this->findEntity())) {
            return new FailedResult();
        }

        if (null === ($newEntity = $this->updateEntity($oldEntity))) {
            return new FailedResult();
        }

        if ($newEntity->equals($oldEntity)) {
            return new SuccessfulResult();
        }

        $this->eventDispatcher
            ->dispatch(
                new UpdateEntityEvent(
                    $this->eventResolver->createName('entity', 'update'),
                    $oldEntity,
                    $newEntity
                )
            )
            ->dispatch(
                new UpdateEntityEvent(
                    $this->eventResolver->createName($newEntity->getEntityName(), 'update'),
                    $oldEntity,
                    $newEntity
                )
            );

        return new SuccessfulResult();
    }
}
