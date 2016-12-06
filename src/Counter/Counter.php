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
    private $counter = [];

    /**
     * @inheritDoc
     */
    public function next(int $timeStamp) : int
    {
        if (array_key_exists($timeStamp, $this->counter)) {
            return ++$this->counter[$timeStamp];
        }
        $this->counter[$timeStamp] = mt_rand(0, PHP_INT_MAX);

        return $this->counter[$timeStamp];
    }

    /**
     * @inheritDoc
     */
    public function reset() : CounterInterface
    {
        $this->counter = [];

        return $this;
    }
}