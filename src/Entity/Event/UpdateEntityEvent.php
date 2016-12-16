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

namespace Vain\Core\Entity\Event;

use Vain\Core\Entity\EntityInterface;

/**
 * Class UpdateEntityEvent
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UpdateEntityEvent extends AbstractEntityEvent implements UpdateEntityEventInterface
{
    private $oldEntity;

    /**
     * UpdateEntityEvent constructor.
     *
     * @param string          $name
     * @param EntityInterface $entity
     * @param EntityInterface $oldEntity
     */
    public function __construct($name, EntityInterface $entity, EntityInterface $oldEntity)
    {
        $this->oldEntity = $oldEntity;
        parent::__construct($name, $entity);
    }

    /**
     * @inheritDoc
     */
    public function getOldEntity() : EntityInterface
    {
        return $this->oldEntity;
    }

    /**
     * @inheritDoc
     */
    public function getNewEntity() : EntityInterface
    {
        return $this->getEntity();
    }
}
