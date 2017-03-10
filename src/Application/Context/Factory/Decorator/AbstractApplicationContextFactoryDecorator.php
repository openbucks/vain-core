<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Application\Context\Factory\Decorator;

use Vain\Core\Application\Context\Factory\ApplicationContextFactoryInterface;
use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Class AbstractApplicationContextFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplicationContextFactoryDecorator implements ApplicationContextFactoryInterface
{
    private $contextFactory;

    /**
     * AbstractConfigContextFactoryDecorator constructor.
     *
     * @param ApplicationContextFactoryInterface $contextFactory
     */
    public function __construct(ApplicationContextFactoryInterface $contextFactory)
    {
        $this->contextFactory = $contextFactory;
    }

    /**
     * @inheritDoc
     */
    public function createContext(string $env, string $mode) : ApplicationContextInterface
    {
        return $this->contextFactory->createContext($env, $mode);
    }
}
