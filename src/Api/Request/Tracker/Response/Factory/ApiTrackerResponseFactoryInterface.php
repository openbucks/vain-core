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

namespace Vain\Core\Api\Request\Tracker\Response\Factory;

use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Response\ApiResponseInterface;

/**
 * Interface ApiTrackerResponseFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiTrackerResponseFactoryInterface
{
    /**
     * @param ApiRequestInterface $apiRequest
     *
     * @return ApiResponseInterface
     */
    public function createDuplicationResponse(ApiRequestInterface $apiRequest) : ApiResponseInterface;
}
