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

namespace Vain\Core\Api\Extension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class AbstractApiExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiExtension extends Extension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractApiExtension
    {
        $reflectionClass = new \ReflectionClass($this);
        $absolutePath = sprintf(
            '%s%s..%s',
            dirname($reflectionClass->getFileName()),
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR
        );

        $loader = new YamlFileLoader($container, new FileLocator($absolutePath));
        $loader->load('di.yml');

        if (false === $container->has('api.config.composite') || false === $container->hasParameter('app.dir')) {
            return $this;
        }

        $appDir = $container->getParameter('app.dir');
        if (false === strpos($absolutePath, $appDir)) {
            return $this;
        }

        $container
            ->findDefinition('api.config.composite')
            ->addMethodCall(
                'addFile',
                [substr($absolutePath, strlen($appDir) + 1) . 'api']
            );

        if (false === $container->has('api.extension.storage')) {
            return $this;
        }
        $container
            ->findDefinition('api.extension.storage')
            ->addMethodCall(
                'addPath',
                [$absolutePath, str_replace('/Extension', '/Entity', $reflectionClass->getNamespaceName())]
            );

        return $this;
    }
}
