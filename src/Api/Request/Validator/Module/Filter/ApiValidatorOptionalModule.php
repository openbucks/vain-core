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
 * Class ApiValidatorOptionalModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorOptionalModule extends AbstractApiValidatorModuleDecorator
{
    /**
     * @inheritDoc
     */
    public function validate(ServerRequestInterface $serverRequest, ApiParameterConfigInterface $parameterConfig)
    {
        $result = parent::validate($serverRequest, $parameterConfig);

        if (null !== $result) {
            return $result;
        }

        if (false === $parameterConfig->isOptional()) {
            return $result;
        }

        return [$parameterConfig->getName() => $parameterConfig->getDefaultValue()];
    }
}