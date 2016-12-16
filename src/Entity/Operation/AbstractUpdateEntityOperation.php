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

/**
 * Class AbstractUpdateEntityOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractUpdateEntityOperation extends AbstractEntityOperation
{
    private $oldEntity;

    /**
     * AbstractUpdateEntityOperation constructor.
     *
     * @param EntityInterface $newEntity
     * @param EntityInterface $oldEntity
     */
    public function __construct(EntityInterface $newEntity, EntityInterface $oldEntity)
    {
        $this->oldEntity = $oldEntity;
        parent::__construct($newEntity);
    }

    /**
     * @return EntityInterface
     */
    public function getNewEntity(): EntityInterface
    {
        return $this->getEntity();
    }

    /**
     * @return EntityInterface
     */
    public function getOldEntity(): EntityInterface
    {
        return $this->oldEntity;
    }
}
