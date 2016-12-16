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
use Vain\Core\Api\Request\Validator\Module\Decorator\AbstractApiValidatorModuleDecorator;

/**
 * Class ApiValidatorInetModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorInetModule extends AbstractApiValidatorModuleDecorator
{
    /**
     * @inheritDoc
     */
    public function validate(ServerRequestInterface $serverRequest, ApiParameterConfigInterface $parameterConfig)
    {
        $data = parent::validate($serverRequest, $parameterConfig);

        $filteredData = [];
        foreach ($data as $name => $element) {
            if (null === ($filteredElement = filter_var($element, FILTER_VALIDATE_IP, FILTER_NULL_ON_FAILURE))) {
                return null;
            }
            $filteredData[$name] = $filteredElement;
        }

        return $filteredData;
    }
}
