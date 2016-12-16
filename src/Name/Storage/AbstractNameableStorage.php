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

namespace Vain\Core\Name\Storage;

use Vain\Core\Exception\DuplicateItemStorageException;
use Vain\Core\Exception\UnknownItemStorageException;
use Vain\Core\Name\NameableInterface;

/**
 * Class AbstractNameableStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractNameableStorage implements NameableStorageInterface
{
    private $storage = [];

    /**
     * AbstractNameableStorage constructor.
     *
     * @param NameableInterface[] $items
     */
    public function __construct(array $items = [])
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    /**
     * @inheritDoc
     */
    public function addItem(NameableInterface $item) : NameableStorageInterface
    {
        $name = $item->getName();
        if (array_key_exists($name, $this->storage)) {
            throw new DuplicateItemStorageException($this, $item, $this->storage[$name]);
        }
        $this->storage[$name] = $item;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getItem(string $name) : NameableInterface
    {
        if (false === array_key_exists($name, $this->storage)) {
            throw new UnknownItemStorageException($this, $name);
        }

        return $this->storage[$name];
    }

    /**
     * @inheritDoc
     */
    public function getItems() : array
    {
        return $this->storage;
    }
}
