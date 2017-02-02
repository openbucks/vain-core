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

namespace Vain\Core\Exception;

use Vain\Core\Api\Config\Parameter\Factory\ApiParameterConfigFactoryInterface;

/**
 * Class NoRequiredFieldParameterFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoRequiredFieldParameterFactoryException extends ApiParameterConfigFactoryException
{
    /**
     * NoRequiredFieldException constructor.
     *
     * @param ApiParameterConfigFactoryInterface $parameterConfigFactory
     * @param string                             $parameterName
     * @param string                             $requiredField
     */
    public function __construct(
        ApiParameterConfigFactoryInterface $parameterConfigFactory,
        string $parameterName,
        string $requiredField
    ) {
        parent::__construct(
            $parameterConfigFactory,
            sprintf(
                'Required field %s is missing from config for parameter %s',
                $requiredField,
                $parameterName
            )
        );
    }
}
