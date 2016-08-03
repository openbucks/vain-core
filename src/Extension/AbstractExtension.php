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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder as SymfonyContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class AbstractExtension
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractExtension implements ExtensionInterface
{
    /**
     * @inheritDoc
     */
    public function register(SymfonyContainerBuilder $containerBuilder)
    {
        $loader = new YamlFileLoader(
            $containerBuilder,
            new FileLocator(
                sprintf(
                    '%s%s%s%s%s',
                    __DIR__,
                    DIRECTORY_SEPARATOR,
                    '..',
                    DIRECTORY_SEPARATOR,
                    $containerBuilder->getParameter('app.config.dir')
                )
            )
        );
        $loader->load('di.yml');
    }
}