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

use Vain\Core\Config\ConfigInterface;

/**
 * Interface ConfigFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ConfigFactoryInterface
{
    /**
     * @param array $data
     *
     * @return ConfigInterface
     */
    public function createConfig(array $data = []) : ConfigInterface;
}
