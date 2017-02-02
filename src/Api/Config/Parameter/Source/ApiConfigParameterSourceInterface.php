<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */

namespace Vain\Core\Api\Config\Parameter\Source;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;

/**
 * Class ApiConfigParameterSourceInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterSourceInterface
{
    /**
     * @param ServerRequestInterface $serverRequest
     *
     * @return ApiConfigParameterResultInterface
     */
    public function extract(ServerRequestInterface $serverRequest): ApiConfigParameterResultInterface;
}