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

namespace Vain\Core\Application\Module\Decorator;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Vain\Core\Application\Module\ApplicationModuleInterface;

/**
 * Class AbstractApplicationModuleDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplicationModuleDecorator implements ApplicationModuleInterface
{
    private $module;

    /**
     * AbstractApplicationModuleDecorator constructor.
     *
     * @param ApplicationModuleInterface $module
     */
    public function __construct(ApplicationModuleInterface $module)
    {
        $this->module = $module;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->module->getName();
    }

    /**
     * @inheritDoc
     */
    public function register(ContainerBuilder $container) : ApplicationModuleInterface
    {
        $this->module->register($container);

        return $this;
    }

}