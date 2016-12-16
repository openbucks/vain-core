<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   api_V2
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/api_V2
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Config;

use Vain\Core\Api\Config\Parameter\ApiParameterConfigInterface;
use Vain\Core\Security\Config\SecurityConfigInterface;

/**
 * Interface ApiConfigInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigInterface
{
    const FIELD_ROUTE_NAME = 'route_name';
    const FIELD_HANDLER_ALIAS = 'handler_alias';
    const FIELD_URL = 'url';
    const FIELD_METHOD = 'method';
    const FIELD_PARAMETERS = 'parameters';
    const FIELD_SECURITY = 'security';

    /**
     * @return string
     */
    public function getRouteName() : string;

    /**
     * @return string
     */
    public function getHandlerAlias() : string;

    /**
     * @return string
     */
    public function getUrl() : string;

    /**
     * @return string
     */
    public function getMethod() : string;

    /**
     * @return ApiParameterConfigInterface[]
     */
    public function getParameterConfigs() : array;

    /**
     * @return SecurityConfigInterface
     */
    public function getSecurityConfig() : SecurityConfigInterface;
}
