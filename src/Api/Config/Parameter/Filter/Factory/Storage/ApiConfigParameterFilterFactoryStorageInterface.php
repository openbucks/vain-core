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

namespace Vain\Core\Api\Config\Parameter\Filter\Factory\Storage;

use Vain\Core\Api\Config\Parameter\Filter\Factory\ApiConfigParameterFilterFactoryInterface;

/**
 * Interface ApiConfigParameterFilterFactoryStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterFilterFactoryStorageInterface
{
    /**
     * @param string $name
     *
     * @return ApiConfigParameterFilterFactoryInterface
     */
    public function getFactory(string $name) : ApiConfigParameterFilterFactoryInterface;
}