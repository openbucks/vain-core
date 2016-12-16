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
use Vain\Core\Security\Resource\Provider\Storage\ResourceProviderStorageInterface;

/**
 * Class ResourceProviderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ResourceProviderException extends AbstractCoreException
{
    private $providerStorage;

    /**
     * ResourceProviderException constructor.
     *
     * @param ResourceProviderStorageInterface $providerStorage
     * @param string                           $message
     * @param int                              $code
     * @param \Exception|null                  $previous
     */
    public function __construct(
        ResourceProviderStorageInterface $providerStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->providerStorage = $providerStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ResourceProviderStorageInterface
     */
    public function getProviderStorage(): ResourceProviderStorageInterface
    {
        return $this->providerStorage;
    }
}
