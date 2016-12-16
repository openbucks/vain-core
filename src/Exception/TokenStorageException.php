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
use Vain\Core\Security\Token\Storage\SecurityTokenStorageInterface;

/**
 * Class TokenStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TokenStorageException extends AbstractCoreException
{
    private $tokenStorage;

    /**
     * ResourceProviderException constructor.
     *
     * @param SecurityTokenStorageInterface $tokenStorage
     * @param string                        $message
     * @param int                           $code
     * @param \Exception|null               $previous
     */
    public function __construct(
        SecurityTokenStorageInterface $tokenStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->tokenStorage = $tokenStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return SecurityTokenStorageInterface
     */
    public function getTokenStorage(): SecurityTokenStorageInterface
    {
        return $this->tokenStorage;
    }
}
