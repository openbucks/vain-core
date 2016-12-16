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

use Vain\Core\Name\Storage\NameableStorageInterface;

/**
 * Class UnknownItemStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownItemStorageException extends NameableStorageException
{
    /**
     * UnknownLocaleException constructor.
     *
     * @param NameableStorageInterface $storage
     * @param string                   $name
     */
    public function __construct(NameableStorageInterface $storage, string $name)
    {
        parent::__construct($storage, sprintf('Item %s is not registered', $name));
    }
}