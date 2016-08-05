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
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\ContainerInterface as SymfonyContainerInterface;

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
    public function register(SymfonyContainerInterface $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                sprintf(
                    '%s%s%s%s%s',
                    dirname((new \ReflectionClass(get_class($this)))->getFileName()),
                    DIRECTORY_SEPARATOR,
                    '..',
                    DIRECTORY_SEPARATOR,
                    $container->getParameter('app.config.dir')
                )
            )
        );
        $loader->load('di.yml');
    }
}