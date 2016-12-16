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

namespace Vain\Core\Entity\Event\Operation\Factory;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Interface EventOperationFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityEventOperationFactoryInterface
{
    const EVENT_GROUP_NAME = 'entity';
    const EVENT_CREATE_NAME = 'create';
    const EVENT_UPDATE_NAME = 'update';
    const EVENT_DELETE_NAME = 'delete';

    /**
     * @param EntityInterface $entity
     *
     * @return OperationInterface
     */
    public function create(EntityInterface $entity) : OperationInterface;

    /**
     * @param EntityInterface $oldEntity
     * @param EntityInterface $newEntity
     *
     * @return OperationInterface
     */
    public function update(EntityInterface $oldEntity, EntityInterface $newEntity) : OperationInterface;

    /**
     * @param EntityInterface $entity
     *
     * @return OperationInterface
     */
    public function delete(EntityInterface $entity) : OperationInterface;
}
