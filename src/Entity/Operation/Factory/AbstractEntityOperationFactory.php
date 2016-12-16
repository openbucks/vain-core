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

namespace Vain\Core\Entity\Operation\Factory;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractEntityOperationFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEntityOperationFactory implements EntityOperationFactoryInterface, OperationFactoryInterface
{
    private $operationFactory;

    /**
     * AbstractEntityOperationFactory constructor.
     *
     * @param OperationFactoryInterface $operationFactory
     */
    public function __construct(OperationFactoryInterface $operationFactory)
    {
        $this->operationFactory = $operationFactory;
    }

    /**
     * @inheritDoc
     */
    public function decorate(OperationInterface $operation) : OperationInterface
    {
        return $this->operationFactory->decorate($operation);
    }

    /**
     * @inheritDoc
     */
    public function successful() : OperationInterface
    {
        return $this->operationFactory->successful();
    }

    /**
     * @inheritDoc
     */
    public function failed() : OperationInterface
    {
        return $this->operationFactory->failed();
    }

    /**
     * @param EntityInterface $newEntity
     * @param EntityInterface $oldEntity
     *
     * @return mixed
     */
    abstract public function doUpdateEntity(EntityInterface $newEntity, EntityInterface $oldEntity);

    /**
     * @inheritDoc
     */
    public function updateEntity(EntityInterface $newEntity, EntityInterface $oldEntity) : OperationInterface
    {
        if ($newEntity->equals($oldEntity)) {
            return $this->operationFactory->successful();
        }

        return $this->doUpdateEntity($newEntity, $oldEntity);
    }
}
