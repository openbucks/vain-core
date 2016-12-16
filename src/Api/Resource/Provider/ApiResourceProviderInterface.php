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
declare(strict_types = 1);

namespace Vain\Core\Api\Resource\Provider;

use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Resource\ApiResourceInterface;
use Vain\Core\Name\NameableInterface;

/**
 * Interface ApiResourceProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiResourceProviderInterface extends NameableInterface
{
    /**
     * @param string              $resourceName
     * @param ApiRequestInterface $request
     *
     * @return ApiResourceInterface
     */
    public function getResource(string $resourceName, ApiRequestInterface $request) : ApiResourceInterface;
}