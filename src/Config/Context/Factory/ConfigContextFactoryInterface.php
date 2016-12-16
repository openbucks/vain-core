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

namespace Vain\Core\Config\Context\Factory;

use Vain\Core\Application\Context\ApplicationContextInterface;
use Vain\Core\Application\Context\Factory\ApplicationContextFactoryInterface;

/**
 * Interface ConfigContextFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ConfigContextFactoryInterface extends ApplicationContextFactoryInterface
{
    /**
     * @param \ArrayAccess $config
     * @param string       $env
     * @param string       $mode
     *
     * @return ApplicationContextInterface
     */
    public function createFromConfig(\ArrayAccess $config, string $env, string $mode) : ApplicationContextInterface;
}
