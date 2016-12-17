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
use Vain\Core\Entity\Event\CreateEntityEvent;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\FailedResult;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class AbstractCreateEntityOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractCreateEntityOperation extends AbstractOperation
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
    abstract public function createEntity() : EntityInterface;

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (null === ($entity = $this->createEntity())) {
            return new FailedResult();
        }

        $this->eventDispatcher
            ->dispatch(
                new CreateEntityEvent(
                    $this->eventResolver->createName('entity', 'create'),
                    $entity
                )
            )
            ->dispatch(
                new CreateEntityEvent(
                    $this->eventResolver->createName($entity->getEntityName(), 'create'),
                    $entity
                )
            );

        return new SuccessfulResult();
    }
}
