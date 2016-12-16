<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Extension\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class ValidatorModuleCompilerPass
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ValidatorModuleCompilerPass implements CompilerPassInterface
{
    /**
     * @inheritDoc
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->has('api.request.validator.module.storage')) {
            return $this;
        }

        $definition = $container->findDefinition('api.request.validator.module.storage');
        $services = $container->findTaggedServiceIds('validator.factory');
        foreach ($services as $id => $tags) {
            $definition->addMethodCall('addFactory', [new Reference($id)]);
        }

        return $this;
    }
}
