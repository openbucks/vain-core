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

namespace Vain\Core\Config\Context\Factory\Decorator\Assert;

use Vain\Core\Config\Context\Factory\Decorator\AbstractConfigContextFactoryDecorator;
use Vain\Core\Exception\NoRequiredFieldContextException;
use Vain\Core\Application\Context\ApplicationContextInterface;

/**
 * Class ConfigContextFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConfigContextFactoryAssertDecorator extends AbstractConfigContextFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function createFromConfig(\ArrayAccess $config, string $env, string $mode) : ApplicationContextInterface
    {
        if (false === $config->offsetExists('app')) {
            throw new NoRequiredFieldContextException($this, 'app');
        }

        $appSection = $config->offsetGet('app');
        foreach (['name', 'version'] as $requiredField) {
            if (false === array_key_exists($requiredField, $appSection)) {
                throw new NoRequiredFieldContextException($this, $requiredField);
            }
        }

        return parent::createFromConfig($config, $env, $mode);
    }
}
