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

namespace Vain\Core\Api\Request\Validator\Result\Successful;

use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Request\Validator\Result\ApiValidatorResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class ApiRequestValidatorSuccessfulResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorSuccessfulResult extends SuccessfulResult implements ApiValidatorResultInterface
{
    private $apiRequest;

    /**
     * ApiRequestValidatorSuccessfulResult constructor.
     *
     * @param ApiRequestInterface $apiRequest
     */
    public function __construct(ApiRequestInterface $apiRequest)
    {
        $this->apiRequest = $apiRequest;
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getRequest() : ApiRequestInterface
    {
        return $this->apiRequest;
    }

    /**
     * @inheritDoc
     */
    public function getErrors() : array
    {
        return [];
    }
}
