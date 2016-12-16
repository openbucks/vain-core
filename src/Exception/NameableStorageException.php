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
 * Class NameableStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NameableStorageException extends AbstractCoreException
{
    private $storage;

    /**
     * NameableStorageException constructor.
     *
     * @param NameableStorageInterface $storage
     * @param string                   $message
     * @param int                      $code
     * @param \Exception|null          $previous
     */
    public function __construct(
        NameableStorageInterface $storage,
        string $message = '',
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->storage = $storage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return NameableStorageInterface
     */
    public function getStorage(): NameableStorageInterface
    {
        return $this->storage;
    }
}