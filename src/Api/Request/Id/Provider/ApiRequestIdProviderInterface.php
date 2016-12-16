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

namespace Vain\Core\Api\Request\Id\Provider;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Interface RequestIdProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiRequestIdProviderInterface
{
    /**
     * @param ServerRequestInterface $request
     *
     * @return string
     */
    public function getRequestId(ServerRequestInterface $request) : string;
}
