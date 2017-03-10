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
use Vain\Core\Operation\OperationInterface;

/**
 * Interface EntityOperationFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityOperationFactoryInterface
{
    /**
     * @param EntityInterface $entity
     *
     * @return OperationInterface
     */
    public function createOperation(EntityInterface $entity) : OperationInterface;

    /**
     * @param EntityInterface $newEntity
     * @param EntityInterface $oldEntity
     *
     * @return OperationInterface
     */
    public function updateOperation(EntityInterface $newEntity, EntityInterface $oldEntity) : OperationInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return OperationInterface
     */
    public function deleteOperation(EntityInterface $entity) : OperationInterface;
}
