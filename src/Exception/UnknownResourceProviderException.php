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

use Vain\Core\Security\Resource\Provider\Storage\ResourceProviderStorageInterface;

/**
 * Class UnknownAccessControlException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownResourceProviderException extends ResourceProviderException
{
    /**
     * UnknownAccessControlException constructor.
     *
     * @param ResourceProviderStorageInterface $providerStorage
     * @param string                           $name
     */
    public function __construct(ResourceProviderStorageInterface $providerStorage, string $name)
    {
        parent::__construct($providerStorage, sprintf('Unknown resource provider %s', $name));
    }
}
