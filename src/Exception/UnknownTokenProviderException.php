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

use Vain\Core\Security\Token\Storage\SecurityTokenStorageInterface;

/**
 * Class UnknownTokenProviderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownTokenProviderException extends TokenStorageException
{
    /**
     * UnknownAccessControlException constructor.
     *
     * @param SecurityTokenStorageInterface $tokenStorage
     * @param string                        $name
     */
    public function __construct(SecurityTokenStorageInterface $tokenStorage, string $name)
    {
        parent::__construct($tokenStorage, sprintf('Unknown token provider %s', $name));
    }
}
