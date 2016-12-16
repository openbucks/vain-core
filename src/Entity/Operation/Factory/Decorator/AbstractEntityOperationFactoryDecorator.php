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
use Vain\Core\Entity\Operation\Factory\AbstractEntityOperationFactory;
use Vain\Core\Entity\Operation\Factory\EntityOperationFactoryInterface;
use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractOperationFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractEntityOperationFactoryDecorator extends AbstractEntityOperationFactory implements
    EntityOperationFactoryInterface
{
    private $entityOperationFactory;

    /**
     * AbstractOperationFactoryDecorator constructor.
     *
     * @param OperationFactoryInterface       $operationFactory
     * @param EntityOperationFactoryInterface $entityOperationFactory
     */
    public function __construct(
        OperationFactoryInterface $operationFactory,
        EntityOperationFactoryInterface $entityOperationFactory
    ) {
        $this->entityOperationFactory = $entityOperationFactory;
        parent::__construct($operationFactory);
    }

    /**
     * @return EntityOperationFactoryInterface
     */
    public function getEntityOperationFactory(): EntityOperationFactoryInterface
    {
        return $this->entityOperationFactory;
    }

    /**
     * @inheritDoc
     */
    public function createEntity(EntityInterface $entity) : OperationInterface
    {
        return $this->entityOperationFactory->createEntity($entity);
    }

    /**
     * @inheritDoc
     */
    public function doUpdateEntity(EntityInterface $newEntity, EntityInterface $oldEntity) : OperationInterface
    {
        return $this->entityOperationFactory->updateEntity($newEntity, $oldEntity);
    }

    /**
     * @inheritDoc
     */
    public function deleteEntity(EntityInterface $entity) : OperationInterface
    {
        return $this->entityOperationFactory->deleteEntity($entity);
    }
}
