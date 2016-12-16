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

namespace Vain\Core\Api\Request\Validator\Trust;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\Validator\AbstractApiValidator;
use Vain\Core\Api\Request\Validator\Result\ApiValidatorResultInterface;
use Vain\Core\Api\Request\Validator\Result\Successful\ApiValidatorSuccessfulResult;

/**
 * Class ApiTrustValidator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiTrustValidator extends AbstractApiValidator
{
    /**
     * @inheritDoc
     */
    public function validate(
        ServerRequestInterface $serverRequest,
        ApiConfigInterface $apiConfig
    ) : ApiValidatorResultInterface
    {
        return new ApiValidatorSuccessfulResult(
            $this->getApiRequestFactory()
                 ->createRequest(
                     $serverRequest,
                     array_merge(
                         $serverRequest->getQueryParams(),
                         $serverRequest->getParsedBody(),
                         $serverRequest->getHeaders(),
                         $serverRequest->getCookieParams()
                     )
                 )
        );
    }
}
