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

namespace Vain\Core\Api\Request\Tracker\Trust;

use Vain\Core\Api\Command\AbstractApiCommand;
use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Response\ApiResponseInterface;

/**
 * Class ApiRequestTrustTracker
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiTrustTracker extends AbstractApiCommand
{
    /**
     * @inheritDoc
     */
    public function execute(ApiRequestInterface $apiRequest, ApiConfigInterface $apiConfig) : ApiResponseInterface
    {
        return $this->getNextCommand()->execute($apiRequest, $apiConfig);
    }
}
