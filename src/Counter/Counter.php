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
 * Class Counter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class Counter implements CounterInterface
{
    private $counter = 0;

    /**
     * @inheritDoc
     */
    public function next() : int
    {
        return ++$this->counter;
    }

    /**
     * @inheritDoc
     */
    public function reset(int $seed) : CounterInterface
    {
        $this->counter = $seed;

        return $this;
    }
}
