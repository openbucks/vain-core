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

namespace Vain\Core\Event\Config\Factory\Trust;

use Vain\Core\Event\Config\EventConfig;
use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\Config\Factory\EventConfigFactoryInterface;

/**
 * Class TrustEventConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TrustEventConfigFactory implements EventConfigFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createConfig(string $name, array $configData) : EventConfigInterface
    {
        return new EventConfig($configData);
    }
}
