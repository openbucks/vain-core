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

namespace Vain\Core\Api\Request\Validator\Module\Filter;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Request\Validator\Module\ApiValidatorModuleInterface;
use Vain\Core\Api\Request\Validator\Module\Decorator\AbstractApiValidatorModuleDecorator;
use Vain\Core\Time\Factory\TimeFactoryInterface;

/**
 * Class ApiValidatorDateTimeModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorDateTimeModule extends AbstractApiValidatorModuleDecorator
{

    private $timeFactory;

    /**
     * ApiValidatorDateTimeModule constructor.
     *
     * @param ApiValidatorModuleInterface $apiValidatorModule
     * @param TimeFactoryInterface        $timeFactory
     */
    public function __construct(ApiValidatorModuleInterface $apiValidatorModule, TimeFactoryInterface $timeFactory)
    {
        $this->timeFactory = $timeFactory;
        parent::__construct($apiValidatorModule);
    }

    /**
     * @inheritDoc
     */
    public function validate(ServerRequestInterface $serverRequest, ApiParameterConfigInterface $parameterConfig)
    {
        $data = parent::validate($serverRequest, $parameterConfig);

        $filteredData = [];
        foreach ($data as $name => $element) {
            if (null === ($filteredElement = filter_var($element, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE))) {
                return null;
            }
            $filteredData[$name] = $this->timeFactory->createFromString($filteredElement);
        }

        return $filteredData;
    }
}
