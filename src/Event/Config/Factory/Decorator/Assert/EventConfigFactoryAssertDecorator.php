<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-event
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-event
 */

namespace Vain\Core\Event\Config\Factory\Decorator\Assert;

use Vain\Core\Event\Config\EventConfig;
use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\Config\Factory\Decorator\AbstractEventConfigFactoryDecorator;
use Vain\Core\Exception\NoRequiredFieldException;

/**
 * Class EventConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventConfigFactoryAssertDecorator extends AbstractEventConfigFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function createConfig(string $name, array $configData) : EventConfigInterface
    {
        foreach ([EventConfig::FIELD_ALIAS, EventConfig::FIELD_BACKGROUND] as $requiredField) {
            if (false === array_key_exists($requiredField, $configData)) {
                throw new NoRequiredFieldException($this, $name, $requiredField);
            }
        }

        return parent::createConfig($name, $configData);
    }
}
