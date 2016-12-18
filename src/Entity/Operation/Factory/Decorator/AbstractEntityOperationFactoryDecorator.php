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

namespace Vain\Core\Entity\Operation\Factory\Decorator;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Entity\Operation\Factory\EntityOperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractOperationFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEntityOperationFactoryDecorator implements EntityOperationFactoryInterface
{
    private $entityOperationFactory;

    /**
     * AbstractEntityOperationFactoryDecorator constructor.
     *
     * @param EntityOperationFactoryInterface $entityOperationFactory
     */
    public function __construct(EntityOperationFactoryInterface $entityOperationFactory)
    {
        $this->entityOperationFactory = $entityOperationFactory;
    }

    /**
     * @inheritDoc
     */
    public function createOperation(EntityInterface $entity) : OperationInterface
    {
        return $this->entityOperationFactory->createOperation($entity);
    }

    /**
     * @inheritDoc
     */
    public function updateOperation(EntityInterface $newEntity, EntityInterface $oldEntity) : OperationInterface
    {
        return $this->entityOperationFactory->updateOperation($newEntity, $oldEntity);
    }

    /**
     * @inheritDoc
     */
    public function deleteOperation(EntityInterface $entity) : OperationInterface
    {
        return $this->entityOperationFactory->deleteOperation($entity);
    }
}
