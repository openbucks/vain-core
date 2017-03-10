<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */

namespace Vain\Core\Api\Config\Parameter\Source\Factory;

use Vain\Core\Api\Config\Parameter\Source\ApiConfigParameterSourceInterface;
use Vain\Core\Name\NameableInterface;

/**
 * Interface ApiConfigParameterSourceFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterSourceFactoryInterface extends NameableInterface
{
    /**
     * @param string $name
     * @param array  $config
     *
     * @return ApiConfigParameterSourceInterface
     */
    public function createSource($name, array $config): ApiConfigParameterSourceInterface;
}