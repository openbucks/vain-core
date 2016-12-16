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

namespace Vain\Core\Security\Config\Factory\Decorator;

use Vain\Core\Security\Config\Factory\SecurityConfigFactoryInterface;
use Vain\Core\Security\Config\SecurityConfigInterface;

/**
 * Class AbstractSecurityConfigFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSecurityConfigFactoryDecorator implements SecurityConfigFactoryInterface
{
    private $configFactory;

    /**
     * AbstractSecurityConfigFactoryDecorator constructor.
     *
     * @param SecurityConfigFactoryInterface $configFactory
     */
    public function __construct(SecurityConfigFactoryInterface $configFactory)
    {
        $this->configFactory = $configFactory;
    }

    /**
     * @inheritDoc
     */
    public function createSecurityConfig(string $endpointName, array $configData) : SecurityConfigInterface
    {
        return $this->configFactory->createSecurityConfig($endpointName, $configData);
    }
}
