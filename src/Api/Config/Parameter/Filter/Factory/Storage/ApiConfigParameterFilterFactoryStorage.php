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

namespace Vain\Core\Api\Config\Parameter\Filter\Factory\Storage;

use Vain\Core\Api\Config\Parameter\Filter\Factory\ApiConfigParameterFilterFactoryInterface;
use Vain\Core\Name\Storage\AbstractNameableStorage;

/**
 * Class ApiConfigParameterFilterFactoryStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ApiConfigParameterFilterFactoryInterface getItem(string $name)
 */
class ApiConfigParameterFilterFactoryStorage extends AbstractNameableStorage implements
    ApiConfigParameterFilterFactoryStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getFactory(string $name): ApiConfigParameterFilterFactoryInterface
    {
        return $this->getItem($name);
    }
}