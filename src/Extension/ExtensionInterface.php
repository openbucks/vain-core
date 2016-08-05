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

use Symfony\Component\DependencyInjection\ContainerInterface as SymfonyContainerInterface;

/**
 * Interface ExtensionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ExtensionInterface
{
    /**
     * @param SymfonyContainerInterface $container
     *
     * @return ExtensionInterface
     */
    public function register(SymfonyContainerInterface $container);
}