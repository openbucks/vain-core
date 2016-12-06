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

/**
 * Class ComparableInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ComparableInterface
{
    /**
     * @param ComparableInterface $comparable
     *
     * @return bool
     */
    public function equal(ComparableInterface $comparable) : bool;
}