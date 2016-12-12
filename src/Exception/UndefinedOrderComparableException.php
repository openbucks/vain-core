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

namespace Vain\Core\Exception;

use Vain\Core\Comparable\ComparableInterface;

/**
 * Class UndefinedOrderComparableException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UndefinedOrderComparableException extends ComparableException
{
    /**
     * UndefinedOrderComparableException constructor.
     *
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     */
    public function __construct(ComparableInterface $what, ComparableInterface $to)
    {
        parent::__construct(
            $what,
            $to,
            sprintf('%s should be less, equal or greater than %s', get_class($what), get_class($to))
        );
    }
}
