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

namespace Vain\Core\Api\Security\Response\Factory;

use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Response\ApiResponseInterface;

/**
 * Class ApiSecurityResponseFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiSecurityResponseFactoryInterface
{
    /**
     * @param ApiRequestInterface $apiRequest
     *
     * @return ApiResponseInterface
     */
    public function createAccessDeniedResponse(ApiRequestInterface $apiRequest) : ApiResponseInterface;
}