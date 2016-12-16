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

namespace Vain\Core\Config\Context\Factory;

use Vain\Core\Config\Context\ConfigApplicationContext;
use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Class ConfigContextFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConfigContextFactory implements ConfigContextFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createFromConfig(\ArrayAccess $config, string $env, string $mode) : ApplicationContextInterface
    {
        $appSection = $config->offsetGet('app');

        return new ConfigApplicationContext($appSection['name'], $appSection['version'], $env, $mode);
    }
}
