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

use Vain\Core\Operation\OperationInterface;

/**
 * Interface EntityOperationFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityOperationFactoryInterface
{
    /**
     * @param string $entityName
     * @param array  $entityData
     *
     * @return OperationInterface
     */
    public function createOperation(string $entityName, array $entityData) : OperationInterface;

    /**
     * @param string $entityName
     * @param array  $criteria
     * @param array  $entityData
     * @param bool   $lock
     *
     * @return OperationInterface
     */
    public function updateOperation(
        string $entityName,
        array $criteria,
        array $entityData,
        bool $lock = false
    ) : OperationInterface;

    /**
     * @param string $entityName
     * @param array  $criteria
     *
     * @return OperationInterface
     */
    public function deleteOperation(string $entityName, array $criteria) : OperationInterface;
}
