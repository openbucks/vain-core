<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Security\Resource\Provider\Storage;

use Vain\Core\Api\Resource\Provider\ApiResourceProviderInterface;

/**
 * Interface ResourceProviderStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ResourceProviderStorageInterface
{
    /**
     * @param ApiResourceProviderInterface $resourceProvider
     *
     * @return ResourceProviderStorageInterface
     */
    public function addProvider(ApiResourceProviderInterface $resourceProvider) : ResourceProviderStorageInterface;

    /**
     * @param string $resourceName
     *
     * @return ApiResourceProviderInterface
     */
    public function getResourceProvider(string $resourceName) : ApiResourceProviderInterface;
}
