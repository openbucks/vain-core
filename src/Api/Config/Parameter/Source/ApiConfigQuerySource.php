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
 * Class ApiConfigQuerySource
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigQuerySource extends AbstractApiConfigParameterSource
{
    /**
     * @inheritDoc
     */
    public function extract(ServerRequestInterface $serverRequest): ApiConfigParameterResultInterface
    {
        return $this->process($serverRequest->getQueryParams());
    }
}