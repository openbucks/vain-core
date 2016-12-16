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

namespace Vain\Core\Exception;

use Vain\Core\Api\Config\Factory\ApiConfigFactoryInterface;

/**
 * Class NoRequiredFieldException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoRequiredFieldConfigFactoryException extends ApiConfigFactoryException
{
    /**
     * NoRequiredFieldException constructor.
     *
     * @param ApiConfigFactoryInterface $apiConfigFactory
     * @param string                    $routeName
     * @param string                    $requiredField
     */
    public function __construct(
        ApiConfigFactoryInterface $apiConfigFactory,
        string $routeName,
        string $requiredField
    ) {
        parent::__construct(
            $apiConfigFactory,
            sprintf(
                'Required field %s is missing from config for endpoint %s',
                $requiredField,
                $routeName
            )
        );
    }
}
