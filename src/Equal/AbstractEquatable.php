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

namespace Vain\Core\Equal;

/**
 * Class AbstractEquatable
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEquatable implements EquatableInterface
{
    /**
     * @inheritDoc
     */
    public function equals(EquatableInterface $equatable) : bool
    {
        return (spl_object_hash($this) === spl_object_hash($equatable));
    }
}