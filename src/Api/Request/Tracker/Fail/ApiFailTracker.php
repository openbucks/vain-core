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

namespace Vain\Core\Api\Request\Tracker\Fail;

use Vain\Core\Api\Command\ApiCommandInterface;
use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Request\Tracker\Response\Factory\ApiTrackerResponseFactoryInterface;
use Vain\Core\Api\Response\ApiResponseInterface;

/**
 * Class ApiRequestFailTracker
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiFailTracker implements ApiCommandInterface
{
    private $apiResponseFactory;

    /**
     * ApiRequestFailTracker constructor.
     *
     * @param ApiTrackerResponseFactoryInterface $apiResponseFactory
     */
    public function __construct(ApiTrackerResponseFactoryInterface $apiResponseFactory)
    {
        $this->apiResponseFactory = $apiResponseFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(ApiRequestInterface $apiRequest, ApiConfigInterface $apiConfig) : ApiResponseInterface
    {
        return $this->apiResponseFactory->createDuplicationResponse($apiRequest);
    }
}
