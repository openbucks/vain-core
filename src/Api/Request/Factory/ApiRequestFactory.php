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

namespace Vain\Core\Api\Request\Factory;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Request\ApiRequest;
use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Request\Id\Provider\ApiRequestIdProviderInterface;

/**
 * Class ApiRequestFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiRequestFactory implements ApiRequestFactoryInterface
{

    private $idProvider;

    /**
     * ApiRequestFactory constructor.
     *
     * @param ApiRequestIdProviderInterface $requestIdProvider
     */
    public function __construct(ApiRequestIdProviderInterface $requestIdProvider)
    {
        $this->idProvider = $requestIdProvider;
    }

    /**
     * @inheritDoc
     */
    public function createRequest(ServerRequestInterface $request, array $extractedValues) : ApiRequestInterface
    {
        return new ApiRequest($this->idProvider->getRequestId($request), $request, $extractedValues);
    }
}