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

namespace Vain\Core\Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ApplicationModuleCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('app.module.storage')) {
            return $this;
        }

        $definition = $container->findDefinition('app.module.storage');
        $services = $container->findTaggedServiceIds('app.module');
        foreach ($services as $id => $tags) {
            $definition->addMethodCall('addModule', [new Reference($id)]);
        }

        return $this;
    }
}