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

namespace Vain\Core\Entity\Event\Handler;

use Vain\Core\Entity\Event\EntityEventInterface;

/**
 * Interface DeleteEntityEventHandlerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DeleteEntityEventHandlerInterface
{
    /**
     * @param EntityEventInterface $event
     *
     * @return DeleteEntityEventHandlerInterface
     */
    public function delete(EntityEventInterface $event) : DeleteEntityEventHandlerInterface;
}
