<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Security\Config;

/**
 * Class SecurityConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSecurityConfig implements SecurityConfigInterface
{
    private $auth;

    private $resource;

    private $scope;

    private $accessControls;

    private $strategy;

    /**
     * AbstractSecurityConfig constructor.
     *
     * @param string $auth
     * @param string $resource
     * @param string $scope
     * @param array  $accessControls
     * @param string $strategy
     */
    public function __construct(
        string $auth,
        string $resource = '',
        string $scope = '',
        array $accessControls = [],
        string $strategy = ''
    ) {
        $this->auth = $auth;
        $this->resource = $resource;
        $this->scope = $scope;
        $this->accessControls = $accessControls;
        $this->strategy = $strategy;
    }

    /**
     * @inheritDoc
     */
    public function getAuth() : string
    {
        return $this->auth;
    }

    /**
     * @inheritDoc
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * @inheritDoc
     */
    public function getScope() : string
    {
        return $this->scope;
    }

    /**
     * @inheritDoc
     */
    public function getAccessControls() : array
    {
        return $this->accessControls;
    }

    /**
     * @inheritDoc
     */
    public function getStrategy() : string
    {
        return $this->strategy;
    }
}
