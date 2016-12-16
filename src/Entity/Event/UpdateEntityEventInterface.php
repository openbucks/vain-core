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
use Vain\Core\Event\EventInterface;

/**
 * Interface UpdateEntityEventInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface UpdateEntityEventInterface extends EventInterface
{
    /**
     * @return EntityInterface
     */
    public function getOldEntity() : EntityInterface;

    /**
     * @return EntityInterface
     */
    public function getNewEntity() : EntityInterface;
}
