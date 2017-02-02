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

namespace Vain\Core\Api\Config\Parameter\Source\Factory\Storage;

use Vain\Core\Api\Config\Parameter\Source\Factory\ApiConfigParameterSourceFactoryInterface;
use Vain\Core\Name\Storage\AbstractNameableStorage;

/**
 * Class ApiConfigParameterSourceFactoryStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ApiConfigParameterSourceFactoryInterface getItem(string $name)
 */
class ApiConfigParameterSourceFactoryStorage extends AbstractNameableStorage implements
    ApiConfigParameterSourceFactoryStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getFactory(string $name): ApiConfigParameterSourceFactoryInterface
    {
        return $this->getItem($name);
    }
}