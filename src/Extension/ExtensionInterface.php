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
namespace Vain\Core\Extension;

use Symfony\Component\DependencyInjection\ContainerBuilder as SymfonyContainerBuilder;

/**
 * Interface ExtensionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExtensionInterface
{
    /**
     * @param SymfonyContainerBuilder $containerBuilder
     *
     * @return ExtensionInterface
     */
    public function register(SymfonyContainerBuilder $containerBuilder);
}