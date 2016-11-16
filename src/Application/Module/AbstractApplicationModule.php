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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class AbstractApplicationModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplicationModule implements ApplicationModuleInterface
{

    private $name;

    /**
     * AbstractApplicationModule constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function register(ContainerBuilder $container) : ApplicationModuleInterface
    {
        if ($container->isFrozen()) {
            return $this;
        }

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(
                sprintf(
                    '%s%s%s%s%s',
                    dirname((new \ReflectionClass(get_class($this)))->getFileName()),
                    DIRECTORY_SEPARATOR,
                    $container->getParameter('app.config.dir'),
                    DIRECTORY_SEPARATOR
                )
            )
        );
        $loader->load('di.yml');

        return $this;
    }
}