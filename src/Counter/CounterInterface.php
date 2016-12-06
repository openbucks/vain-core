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

namespace Vain\Core\Counter;

/**
 * Interface CounterInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface CounterInterface
{
    /**
     * @return CounterInterface
     */
    public function reset() : CounterInterface;

    /**
     * @param int $timeStamp
     *
     * @return int
     */
    public function next(int $timeStamp) : int;
}