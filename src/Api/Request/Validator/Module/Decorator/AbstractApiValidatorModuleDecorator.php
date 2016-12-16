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

namespace Vain\Core\Api\Request\Validator\Module\Decorator;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Api\Request\Validator\Module\ApiValidatorModuleInterface;

/**
 * Class AbstractApiValidatorModuleDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiValidatorModuleDecorator implements ApiValidatorModuleInterface
{
    private $apiValidatorModule;

    /**
     * AbstractApiValidatorModuleDecorator constructor.
     *
     * @param ApiValidatorModuleInterface $apiValidatorModule
     */
    public function __construct(ApiValidatorModuleInterface $apiValidatorModule)
    {
        $this->apiValidatorModule = $apiValidatorModule;
    }

    /**
     * @inheritDoc
     */
    public function validate(ServerRequestInterface $serverRequest, ApiParameterConfigInterface $parameterConfig)
    {
        return $this->apiValidatorModule->validate($serverRequest, $parameterConfig);
    }
}
