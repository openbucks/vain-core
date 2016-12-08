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
declare(strict_types = 1);

namespace Vain\Core\Bootstrapper\Factory;

use Vain\Core\Bootstrapper\BootstrapperInterface;

/**
 * Class BootstrapperFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface BootstrapperFactoryInterface
{
    /**
     * @return BootstrapperInterface
     */
    public function createBootstrapper() : BootstrapperInterface;
}
