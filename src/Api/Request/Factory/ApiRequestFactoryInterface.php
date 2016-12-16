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
use Vain\Core\Api\Request\ApiRequestInterface;

/**
 * Interface ApiRequestFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiRequestFactoryInterface
{
    /**
     * @param ServerRequestInterface $request
     * @param array                  $extractedValues
     *
     * @return ApiRequestInterface
     */
    public function createRequest(ServerRequestInterface $request, array $extractedValues) : ApiRequestInterface;
}
