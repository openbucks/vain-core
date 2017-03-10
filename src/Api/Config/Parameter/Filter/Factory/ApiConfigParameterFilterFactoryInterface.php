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

namespace Vain\Core\Api\Config\Parameter\Filter\Factory;

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;
use Vain\Core\Name\NameableInterface;

/**
 * Interface ApiConfigParameterFilterFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterFilterFactoryInterface extends NameableInterface
{
    /**
     * @param array $config
     *
     * @return ApiConfigParameterFilterInterface
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface;
}