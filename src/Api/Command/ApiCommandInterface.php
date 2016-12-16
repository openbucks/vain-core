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

namespace Vain\Core\Api\Command;

use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Response\ApiResponseInterface;

/**
 * Interface ApiCommandInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiCommandInterface
{
    /**
     * @param ApiRequestInterface $apiRequest
     * @param ApiConfigInterface $apiConfig
     *
     * @return ApiResponseInterface
     */
    public function execute(ApiRequestInterface $apiRequest, ApiConfigInterface $apiConfig) : ApiResponseInterface;
}
