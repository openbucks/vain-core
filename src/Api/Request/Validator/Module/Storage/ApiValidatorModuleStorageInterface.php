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
declare(strict_types = 1);

namespace Vain\Core\Api\Request\Validator\Module\Storage;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Request\Validator\Module\ApiValidatorModuleInterface;
use Vain\Core\Api\Request\Validator\Module\Factory\ApiValidatorModuleFactoryInterface;

/**
 * Interface ApiValidatorModuleStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiValidatorModuleStorageInterface
{
    /**
     * @param ApiValidatorModuleFactoryInterface $moduleFactory
     *
     * @return ApiValidatorModuleStorageInterface
     */
    public function addFactory(ApiValidatorModuleFactoryInterface $moduleFactory) : ApiValidatorModuleStorageInterface;

    /**
     * @param ApiParameterConfigInterface $parameterConfig
     *
     * @return ApiValidatorModuleInterface
     */
    public function getModule(ApiParameterConfigInterface $parameterConfig) : ApiValidatorModuleInterface;
}
