<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */

namespace Vain\Core\Api\Request\Validator\Module\Factory;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Request\Validator\Module\ApiValidatorModuleInterface;

/**
 * Interface ApiValidatorModuleFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiValidatorModuleFactoryInterface
{
    /**
     * @return array
     */
    public function getNames() : array;

    /**
     * @param ApiParameterConfigInterface $apiParameterConfig
     * @param ApiValidatorModuleInterface $apiValidatorModule
     *
     * @return ApiValidatorModuleInterface
     */
    public function createModule(
        ApiParameterConfigInterface $apiParameterConfig,
        ApiValidatorModuleInterface $apiValidatorModule = null
    ) : ApiValidatorModuleInterface;
}
