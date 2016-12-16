<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Config\Provider;

use Vain\Core\Config\ConfigInterface;

/**
 * Interface ConfigProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ConfigProviderInterface
{
    /**
     * @param string $configName
     *
     * @return ConfigInterface
     */
    public function getConfig(string $configName) : ConfigInterface;
}
