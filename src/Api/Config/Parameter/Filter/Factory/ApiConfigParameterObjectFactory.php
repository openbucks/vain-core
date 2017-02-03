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

namespace Vain\Core\Api\Config\Parameter\Filter\Factory;

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterObjectFilter;
use Vain\Core\Api\Config\Parameter\Filter\Factory\Storage\ApiConfigParameterFilterFactoryStorageInterface;

/**
 * Class ApiConfigParameterObjectFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterObjectFactory implements ApiConfigParameterFilterFactoryInterface
{
    private $filterFactoryStorage;

    /**
     * ApiConfigParameterObjectFactory constructor.
     *
     * @param ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage
     */
    public function __construct(ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage)
    {
        $this->filterFactoryStorage = $filterFactoryStorage;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'object';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        return new ApiConfigParameterObjectFilter($this->filterFactoryStorage, $config['fields']);
    }
}
