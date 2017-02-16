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
use Vain\Core\Entity\Event\DeleteEntityEvent;
use Vain\Core\Entity\Result\CannotDeleteEntityResult;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class AbstractDeleteEntityOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractDeleteEntityOperation extends AbstractOperation
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
    abstract public function deleteEntity() : EntityInterface;

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (null === ($entity = $this->deleteEntity())) {
            return new CannotDeleteEntityResult($entity);
        }

        $this->eventDispatcher
            ->dispatch(new DeleteEntityEvent($this->eventResolver->createName('entity', 'delete'), $entity))
            ->dispatch(
                new DeleteEntityEvent($this->eventResolver->createName($entity->getEntityName(), 'delete'), $entity)
            );

        return new SuccessfulResult();
    }
}
