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

namespace Vain\Core\Application\Context\Factory\Decorator\Assert;

use Vain\Core\Application\Context\Factory\ApplicationContextFactoryInterface;
use Vain\Core\Application\Context\Factory\Decorator\AbstractApplicationContextFactoryDecorator;
use Vain\Core\Exception\NoRequiredFieldContextException;
use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Class ApplicationContextFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationContextFactoryAssertDecorator extends AbstractApplicationContextFactoryDecorator
{

    private $config;

    /**
     * ContextFactoryAssertDecorator constructor.
     *
     * @param ApplicationContextFactoryInterface $contextFactory
     * @param \ArrayAccess                       $config
     */
    public function __construct(ApplicationContextFactoryInterface $contextFactory, \ArrayAccess $config)
    {
        $this->config = $config;
        parent::__construct($contextFactory);
    }

    /**
     * @inheritDoc
     */
    public function createContext(string $env, string $mode) : ApplicationContextInterface
    {
        if (false === $this->config->offsetExists('app')) {
            throw new NoRequiredFieldContextException($this, 'app');
        }

        $appSection = $this->config->offsetGet('app');
        foreach (['name', 'version'] as $requiredField) {
            if (false === array_key_exists($requiredField, $appSection)) {
                throw new NoRequiredFieldContextException($this, $requiredField);
            }
        }

        return parent::createContext($env, $mode);
    }
}
