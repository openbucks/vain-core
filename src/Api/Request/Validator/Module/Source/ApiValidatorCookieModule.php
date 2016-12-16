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
 * Class ApiValidatorCookieModule
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiValidatorCookieModule extends AbstractApiValidatorModule
{
    /**
     * @inheritDoc
     */
    public function validate(ServerRequestInterface $serverRequest, ApiParameterConfigInterface $parameterConfig)
    {
        $cookieParams = $serverRequest->getCookieParams();
        if (false === array_key_exists($parameterConfig->getSourceName(), $cookieParams)) {
            return [$parameterConfig->getName() => $parameterConfig->getDefaultValue()];
        }

        return [$parameterConfig->getName() => $cookieParams[$parameterConfig->getSourceName()]];
    }
}
