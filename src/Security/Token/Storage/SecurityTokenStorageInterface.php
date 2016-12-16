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

namespace Vain\Core\Security\Token\Storage;

use Vain\Core\Security\Token\Provider\SecurityTokenProviderInterface;

/**
 * Interface SecurityTokenStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityTokenStorageInterface
{
    /**
     * @param string $authType
     *
     * @return SecurityTokenProviderInterface
     */
    public function getProvider(string $authType) : SecurityTokenProviderInterface;
}
