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

use Symfony\Component\DependencyInjection\ContainerBuilder;

interface ApplicationModuleInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param ContainerBuilder $container
     *
     * @return ApplicationModuleInterface
     */
    public function register(ContainerBuilder $container) : ApplicationModuleInterface;
}