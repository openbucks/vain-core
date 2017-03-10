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

use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Interface ApplicationContextFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationContextFactoryInterface
{
    /**
     * @param string $env
     * @param string $mode
     *
     * @return ApplicationContextInterface
     */
    public function createContext(string $env, string $mode) : ApplicationContextInterface;
}
