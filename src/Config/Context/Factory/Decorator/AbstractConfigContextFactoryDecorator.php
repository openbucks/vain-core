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

namespace Vain\Core\Config\Context\Factory\Decorator;

use Vain\Core\Config\Context\Factory\ConfigContextFactoryInterface;
use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Class AbstractConfigContextFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractConfigContextFactoryDecorator implements ConfigContextFactoryInterface
{
    private $contextFactory;

    /**
     * AbstractConfigContextFactoryDecorator constructor.
     *
     * @param ConfigContextFactoryInterface $contextFactory
     */
    public function __construct(ConfigContextFactoryInterface $contextFactory)
    {
        $this->contextFactory = $contextFactory;
    }

    /**
     * @inheritDoc
     */
    public function createFromConfig(\ArrayAccess $config, string $env, string $mode) : ApplicationContextInterface
    {
        return $this->contextFactory->createFromConfig($config, $env, $mode);
    }
}
