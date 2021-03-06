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

namespace Vain\Core\Config\Factory;

use Vain\Core\Config\Config;
use Vain\Core\Config\ConfigInterface;
use Vain\Core\Config\Factory\ConfigFactoryInterface;

/**
 * Class ConfigFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConfigFactory implements ConfigFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createConfig(array $data = []) : ConfigInterface
    {
        return new Config($data);
    }
}
