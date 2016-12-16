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

namespace Vain\Core\Security\Config\Factory;

use Vain\Core\Security\Config\SecurityConfigInterface;

/**
 * Interface SecurityConfigFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityConfigFactoryInterface
{
    /**
     * @param string $endpointName
     * @param array  $configData
     *
     * @return SecurityConfigInterface
     */
    public function createSecurityConfig(string $endpointName, array $configData) : SecurityConfigInterface;
}
