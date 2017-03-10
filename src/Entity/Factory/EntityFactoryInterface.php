<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Entity\Factory;

use Vain\Core\Entity\EntityInterface;

/**
 * Class EntityFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityFactoryInterface
{
    /**
     * @param string $entityName
     * @param array  $entityData
     *
     * @return EntityInterface
     */
    public function createEntity(string $entityName, array $entityData) : EntityInterface;

    /**
     * @param EntityInterface $entity
     * @param array           $entityData
     *
     * @return EntityInterface
     */
    public function updateEntity(EntityInterface $entity, array $entityData) : EntityInterface;
}