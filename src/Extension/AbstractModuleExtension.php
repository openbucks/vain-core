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

namespace Vain\Core\Extension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class AbstractModuleExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractModuleExtension extends Extension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container) : AbstractModuleExtension
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                sprintf(
                    '%s%s..%s',
                    dirname((new \ReflectionClass(get_class($this)))->getFileName()),
                    DIRECTORY_SEPARATOR,
                    DIRECTORY_SEPARATOR
                )
            )
        );
        $loader->load('di.yml');

        return $this;
    }
}