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

namespace Vain\Core\Api\Request\Validator\Module\Source;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Request\Validator\Module\AbstractApiValidatorModule;

/**
 * Class ApiValidatorHeaderModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorHeaderModule extends AbstractApiValidatorModule
{
    /**
     * @inheritDoc
     */
    public function validate(ServerRequestInterface $serverRequest, ApiParameterConfigInterface $parameterConfig)
    {
        if (false === $serverRequest->hasHeader($parameterConfig->getSourceName())) {
            return $parameterConfig->getDefaultValue();
        }

        return [$parameterConfig->getName() => $serverRequest->getHeaderLine($parameterConfig->getSourceName())];
    }
}
