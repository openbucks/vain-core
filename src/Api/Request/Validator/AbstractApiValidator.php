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

namespace Vain\Core\Api\Request\Validator;

use Vain\Core\Api\Request\Factory\ApiRequestFactoryInterface;

/**
 * Class AbstractApiValidator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiValidator implements ApiValidatorInterface
{
    private $apiRequestFactory;

    /**
     * AbstractApiValidator constructor.
     *
     * @param ApiRequestFactoryInterface $apiRequestFactory
     */
    public function __construct(ApiRequestFactoryInterface $apiRequestFactory)
    {
        $this->apiRequestFactory = $apiRequestFactory;
    }

    /**
     * @return ApiRequestFactoryInterface
     */
    public function getApiRequestFactory(): ApiRequestFactoryInterface
    {
        return $this->apiRequestFactory;
    }
}
