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

namespace Vain\Core\Comparable;

use Vain\Core\Equal\EquatableInterface;

/**
 * Class ComparableInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ComparableInterface extends EquatableInterface
{
    const EQUAL = 0;
    const LESS = -1;
    const GREATER = 1;

    /**
     * @param ComparableInterface $comparable
     *
     * @return int
     */
    public function compare(ComparableInterface $comparable) : int;
}
