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
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterFailedResult;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterSuccessfulResult;

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
     */
    public function __construct(
        ApiConfigParameterFilterFactoryStorageInterface $filterFactoryStorage,
        array $fieldConfigs
    ) {
        $this->filterFactoryStorage = $filterFactoryStorage;
        $this->fieldConfigs = $fieldConfigs;
    }

    /**
     * @inheritDoc
     */
    public function doFilter(string $name, $element): ApiConfigParameterResultInterface
    {
        if (null === ($array = filter_var(
                $element,
                FILTER_UNSAFE_RAW,
                ['flags' => FILTER_NULL_ON_FAILURE | FILTER_REQUIRE_ARRAY]
            ))
        ) {
            return new ApiConfigParameterFailedResult(
                sprintf('Parameter %s [%s] is not an object', $name, var_export($element, true))
            );
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
