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

namespace Vain\Core\Api\Config\Parameter\Source\Factory\Storage;

use Vain\Core\Api\Config\Parameter\Source\Factory\ApiConfigParameterSourceFactoryInterface;

/**
 * Interface ApiConfigParameterSourceFactoryStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterSourceFactoryStorageInterface
{
    /**
     * @param string $name
     *
     * @return ApiConfigParameterSourceFactoryInterface
     */
    public function getFactory(string $name) : ApiConfigParameterSourceFactoryInterface;
}