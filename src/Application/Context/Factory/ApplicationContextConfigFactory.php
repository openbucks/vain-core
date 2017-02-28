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

namespace Vain\Core\Application\Context\Factory;

use Vain\Core\Application\Context\ApplicationContext;
use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Class ApplicationContextConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationContextConfigFactory implements ApplicationContextFactoryInterface
{
    private $config;

    /**
     * ApplicationContextConfigFactory constructor.
     *
     * @param \ArrayAccess $config
     */
    public function __construct(\ArrayAccess $config)
    {
        $this->config = $config;
    }

    /**
     * @inheritDoc
     */
    public function createContext(string $env, string $mode): ApplicationContextInterface
    {
        $appSection = $this->config->offsetGet('app');

        return new ApplicationContext(
            gethostname(),
            getmypid(),
            $appSection['name'],
            $appSection['version'],
            $env,
            $mode
        );
    }
}
