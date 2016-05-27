<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/1/16
 * Time: 12:57 PM
 */

namespace Vain\Core\Runtime;

use Vain\Core\Runtime\Exception\UnknownPropertyRuntimeDataException;

class RuntimeData implements \ArrayAccess, \Countable
{
    private $storage;

    /**
     * VainCoreData constructor.
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