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

namespace Vain\Core\Api\Config\Parameter\Filter;

use Vain\Core\Api\Config\Parameter\Filter\Factory\Storage\ApiConfigParameterFilterFactoryStorageInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterSuccessfulResult;
use Vain\Core\Api\Config\Parameter\Result\ApiParameterWrongTypeResult;

/**
 * Class ApiConfigParameterObjectFilter
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterObjectFilter extends AbstractApiConfigParameterFilter
{
    private $filterFactoryStorage;

    private $fieldConfigs;

    /**
     * ApiConfigParameterObjectFilter constructor.
     *
     * @param ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage
     * @param array                                           $fieldConfigs
     * @param bool                                            $isOptional
     * @param mixed                                           $default
     */
    public function __construct(
        ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage,
        array $fieldConfigs,
        bool $isOptional = false,
        $default = null
    ) {
        $this->filterFactoryStorage = $filterFactoryStorage;
        $this->fieldConfigs = $fieldConfigs;
        parent::__construct($isOptional, $default);
    }

    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (false === ($array = filter_var($element, FILTER_UNSAFE_RAW, ['flags' => FILTER_REQUIRE_ARRAY]))) {
            return new ApiParameterWrongTypeResult($name, 'object', $element);
        }

        $filteredData = [];
        foreach ($this->fieldConfigs as $name => $config) {
            $result = $this->filterFactoryStorage->getFactory($config['type'])->createFilter($config)->filter($array);
            if (false === $result->isSuccessful()) {
                return $result;
            }
            $filteredData[$name] = $result->getValue();
        }

        return new ApiConfigParameterSuccessfulResult($filteredData);
    }
}
