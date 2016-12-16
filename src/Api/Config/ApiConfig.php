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

namespace Vain\Core\Api\Config;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Security\Config\SecurityConfigInterface;

/**
 * Class ApiConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfig implements ApiConfigInterface
{
    private $routeName;

    private $handlerAlias;

    private $url;

    private $method;

    private $securityConfig;

    private $parameterConfigs;

    /**
     * ApiConfig constructor.
     *
     * @param string                        $routeName
     * @param string                        $handlerAlias
     * @param string                        $url
     * @param string                        $method
     * @param SecurityConfigInterface       $securityConfig
     * @param ApiParameterConfigInterface[] $parameterConfigs
     */
    public function __construct(
        string $routeName,
        string $handlerAlias,
        string $url,
        string $method,
        SecurityConfigInterface $securityConfig,
        array $parameterConfigs = []
    ) {
        $this->routeName = $routeName;
        $this->handlerAlias = $handlerAlias;
        $this->url = $url;
        $this->method = $method;
        $this->securityConfig = $securityConfig;
        $this->parameterConfigs = $parameterConfigs;
    }

    /**
     * @inheritDoc
     */
    public function getRouteName() : string
    {
        return $this->routeName;
    }

    /**
     * @inheritDoc
     */
    public function getHandlerAlias() : string
    {
        return $this->handlerAlias;
    }

    /**
     * @inheritDoc
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function getSecurityConfig() : SecurityConfigInterface
    {
        return $this->securityConfig;
    }

    /**
     * @inheritDoc
     */
    public function getParameterConfigs() : array
    {
        return $this->parameterConfigs;
    }
}
