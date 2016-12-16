<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-queue
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-queue
 */
declare(strict_types = 1);

namespace Vain\Core\Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class QueueMessageFactoryCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueMessageFactoryCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('queue.message.factory.storage')) {
            return $this;
        }

        $definition = $container->findDefinition('queue.message.factory.storage');
        $services = $container->findTaggedServiceIds('queue.message.factory');
        foreach ($services as $id => $tags) {
            $definition->addMethodCall('addFactory', [new Reference($id)]);
        }

        return $this;
    }
}
