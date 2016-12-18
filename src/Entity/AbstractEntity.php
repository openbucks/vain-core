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

namespace Vain\Core\Entity;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Equal\EquatableInterface;

/**
 * Class AbstractEntity
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method EntityInterface fromArray(array $data)
 */
abstract class AbstractEntity implements EntityInterface
{
    /**
     * @inheritDoc
     */
    public function equals(EquatableInterface $equatable) : bool
    {
        /**
         * @var EntityInterface $equatable
         */

        return ($this->getPrimaryKey() === $equatable->getPrimaryKey())
               && ($this->getEntityName() === $equatable->getEntityName());
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data) : ArrayInterface
    {
        foreach ($data as $field => $value) {
            if (false === property_exists($this, $field)) {
                continue;
            }
            $this->{$field} = $value;
        }

        return $this;
    }
}
