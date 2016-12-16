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
use Vain\Core\Name\Storage\AbstractNameableStorage;

/**
 * Class ResourceProviderStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ApiResourceProviderInterface getItem(string $name)
 */
class ResourceProviderStorage extends AbstractNameableStorage  implements ResourceProviderStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getResourceProvider(string $resourceName) : ApiResourceProviderInterface
    {
        return $this->getItem($resourceName);
    }
}
