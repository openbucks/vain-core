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

use Vain\Core\Name\NameableInterface;

/**
 * Interface NameableStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface NameableStorageInterface
{
    /**
     * @param NameableInterface $item
     *
     * @return NameableStorageInterface
     */
    public function addItem(NameableInterface $item) : NameableStorageInterface;

    /**
     * @param string $name
     *
     * @return NameableInterface
     */
    public function getItem(string $name) : NameableInterface;

    /**
     * @return NameableInterface[]
     */
    public function getItems() : array;
}