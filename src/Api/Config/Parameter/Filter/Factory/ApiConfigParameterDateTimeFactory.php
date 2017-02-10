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

namespace Vain\Core\Api\Config\Parameter\Filter\Factory;

use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterDateTimeFilter;
use Vain\Core\Api\Config\Parameter\Filter\ApiConfigParameterFilterInterface;
use Vain\Core\Time\Factory\TimeFactoryInterface;

/**
 * Class ApiConfigParameterDateTimeFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterDateTimeFactory implements ApiConfigParameterFilterFactoryInterface
{
    private $timeFactory;

    /**
     * ApiValidatorDateTimeModuleFactory constructor.
     *
     * @param TimeFactoryInterface $timeFactory
     */
    public function __construct(TimeFactoryInterface $timeFactory)
    {
        $this->timeFactory = $timeFactory;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'datetime';
    }

    /**
     * @inheritDoc
     */
    public function createFilter(array $config): ApiConfigParameterFilterInterface
    {
        return new ApiConfigParameterDateTimeFilter(
            $this->timeFactory,
            $config['optional'] ?? false,
            $config['default'] ?? null
        );
    }
}
