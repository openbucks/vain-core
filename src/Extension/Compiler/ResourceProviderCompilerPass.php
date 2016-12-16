<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ResourceProviderCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ResourceProviderCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('security.resource.provider.storage')) {
            return $this;
        }

        $definition = $container->findDefinition('security.resource.provider.storage');
        $services = $container->findTaggedServiceIds('security.resource.provider');
        foreach ($services as $id => $tags) {
            $definition->addMethodCall('addProvider', [new Reference($id)]);
        }

        return $this;
    }
}
