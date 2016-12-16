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

namespace Vain\Core\Config\Data\Provider;

/**
 * Interface ConfigDataProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ConfigDataProviderInterface
{
    /**
     * @param string $fileName
     *
     * @return array
     */
    public function getConfigData(string $fileName) : array;
}
