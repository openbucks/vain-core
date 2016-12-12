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

use Vain\Core\Equal\AbstractEquatable;
use Vain\Core\Exception\UndefinedOrderComparableException;

/**
 * Class AbstractComparable
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractComparable extends AbstractEquatable implements ComparableInterface
{
    /**
     * @inheritDoc
     */
    public function compare(ComparableInterface $comparable) : int
    {
        if ($this->less($comparable)) {
            return -1;
        }

        if ($this->equals($comparable)) {
            return 0;
        }

        if ($this->greater($comparable)) {
            return 1;
        }

        throw new UndefinedOrderComparableException($this, $comparable);
    }
}
