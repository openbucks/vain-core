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

namespace Vain\Core\Application\Module;

use Vain\Core\Container\ContainerInterface;

/**
 * Interface ApplicationModuleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationModuleInterface
{
    /**
     * @param ContainerInterface $container
     *
     * @return ApplicationModuleInterface
     */
    public function register(ContainerInterface $container) : ApplicationModuleInterface;
}