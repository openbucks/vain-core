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

namespace Vain\Core\Event\Config\Factory;

use Vain\Core\Event\Config\EventConfigInterface;

/**
 * Interface EventConfigFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventConfigFactoryInterface
{
    /**
     * @param string $name
     * @param array  $configData
     *
     * @return mixed
     */
    public function createConfig(string $name, array $configData) : EventConfigInterface;
}
