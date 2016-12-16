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

namespace Vain\Core\Entity\Repository;

use Vain\Core\Entity\EntityInterface;

/**
 * Interface EntityRepositoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityRepositoryInterface
{
    /**
     * @param string $name
     * @param mixed  $criteria
     *
     * @return EntityInterface|null
     */
    public function getEntity(string $name, $criteria) : EntityInterface;

    /**
     * @param string $name
     * @param mixed  $criteria
     *
     * @return EntityInterface[]
     */
    public function getEntities(string $name, $criteria) : array;
}
