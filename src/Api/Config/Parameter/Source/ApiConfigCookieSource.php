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

namespace Vain\Core\Api\Config\Parameter\Source;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;

/**
 * Class ApiConfigCookieSource
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigCookieSource extends AbstractApiConfigParameterSource
{
    /**
     * @inheritDoc
     */
    public function extract(ServerRequestInterface $serverRequest): ApiConfigParameterResultInterface
    {
        return $this->process($serverRequest->getCookieParams());
    }
}
