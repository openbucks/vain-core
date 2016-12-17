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
    public function createOperation(string $entityName, array $entityData) : OperationInterface
    {
        return $this->entityOperationFactory->createOperation($entityName, $entityData);
    }

    /**
     * @inheritDoc
     */
    public function updateOperation(
        string $entityName,
        array $criteria,
        array $entityData,
        bool $lock = false
    ) : OperationInterface
    {
        return $this->entityOperationFactory->updateOperation($entityName, $criteria, $entityData, $lock);
    }

    /**
     * @inheritDoc
     */
    public function deleteOperation(string $entityName, array $criteria) : OperationInterface
    {
        return $this->entityOperationFactory->deleteOperation($entityName, $criteria);
    }
}
