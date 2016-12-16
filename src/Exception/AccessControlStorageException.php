<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Security\Access\Storage\AccessControlStorageInterface;

/**
 * Class AccessControlStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AccessControlStorageException extends AbstractCoreException
{
    private $accessControlStorage;

    /**
     * AccessControlStorageException constructor.
     *
     * @param AccessControlStorageInterface $accessControlStorage
     * @param string                        $message
     * @param int                           $code
     * @param \Exception|null               $previous
     */
    public function __construct(
        AccessControlStorageInterface $accessControlStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->accessControlStorage = $accessControlStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return AccessControlStorageInterface
     */
    public function getAccessControlStorage(): AccessControlStorageInterface
    {
        return $this->accessControlStorage;
    }
}
