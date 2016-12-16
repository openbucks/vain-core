<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   api_V2
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/api_V2
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Request\Id\Provider\Header;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Request\Id\Provider\AbstractApiRequestIdProvider;
use Vain\Core\Api\Request\Id\Provider\ApiRequestIdProviderInterface;

/**
 * Class ApiRequestIdHeaderProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiRequestIdHeaderProvider extends AbstractApiRequestIdProvider
{
    private $headerName;

    /**
     * ApiRequestIdHeaderProvider constructor.
     *
     * @param ApiRequestIdProviderInterface $requestIdProvider
     * @param string                        $headerName
     */
    public function __construct(ApiRequestIdProviderInterface $requestIdProvider, string $headerName)
    {
        $this->headerName = $headerName;
        parent::__construct($requestIdProvider);
    }

    /**
     * @inheritDoc
     */
    public function getRequestId(ServerRequestInterface $request) : string
    {
        if (false === $request->hasHeader($this->headerName)) {
            return $this->getNextProvider()->getRequestId($request);
        }

        return $request->getHeaderLine($this->headerName);
    }
}
