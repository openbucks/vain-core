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

namespace Vain\Core\Api\Request\Validator\Module\Filter\Factory;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Request\Validator\Module\ApiValidatorModuleInterface;
use Vain\Core\Api\Request\Validator\Module\Factory\ApiValidatorModuleFactoryInterface;
use Vain\Core\Api\Request\Validator\Module\Filter\ApiValidatorDateTimeModule;
use Vain\Core\Time\Factory\TimeFactoryInterface;

/**
 * Class ApiValidatorDateTimeModuleFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorDateTimeModuleFactory implements ApiValidatorModuleFactoryInterface
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
    public function getNames() : array
    {
        return ['datetime'];
    }

    /**
     * @inheritDoc
     */
    public function createModule(
        ApiParameterConfigInterface $apiParameterConfig,
        ApiValidatorModuleInterface $apiValidatorModule = null
    ) : ApiValidatorModuleInterface
    {
        return new ApiValidatorDateTimeModule($apiValidatorModule, $this->timeFactory);
    }
}
