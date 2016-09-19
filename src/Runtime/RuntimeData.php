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

namespace Vain\Core\Runtime;

use Vain\Core\Runtime\Exception\UnknownPropertyRuntimeDataException;

/**
 * Class RuntimeData
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RuntimeData implements \ArrayAccess, \Countable
{
    private $storage;

    /**
     * VainCoreData constructor.
     *
     * @param array $storage
     */
    public function __construct(array $storage = [])
    {
        $this->storage = $storage;
    }

    /**
     * @inheritDoc
     */
    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->storage);
    }

    /**
     * @inheritDoc
     */
    public function offsetGet($offset)
    {
        if (false === array_key_exists($offset, $this->storage)) {
            throw new UnknownPropertyRuntimeDataException($this, $offset);
        }

        return $this->storage[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->storage[$offset] = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function offsetUnset($offset)
    {
        unset($this->storage[$offset]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->storage);
    }
}