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
 * Class ProcessorStrategyCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ProcessorStrategyCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('security.processor.strategy.storage')) {
            return $this;
        }

        $definition = $container->findDefinition('security.processor.strategy.storage');
        $services = $container->findTaggedServiceIds('security.processor.strategy');
        foreach ($services as $id => $tags) {
            $definition->addMethodCall('addItem', [new Reference($id)]);
        }

        return $this;
    }
}
