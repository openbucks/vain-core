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
 * Interface SecurityConfigInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityConfigInterface
{
    const FIELD_ENABLED = 'enabled';
    const FIELD_AUTH = 'auth';
    const FIELD_PERMISSION = 'permission';
    const FIELD_SCOPE = 'scope';
    const FIELD_ACCESS_CONTROLS = 'access_controls';
    const FIELD_STRATEGY = 'strategy';

    /**
     * @return bool
     */
    public function isEnabled() : bool;

    /**
     * @return string
     */
    public function getAuth() : string;

    /**
     * @return string
     */
    public function getResource(): string;

    /**
     * @return string
     */
    public function getScope() : string;

    /**
     * @return array
     */
    public function getAccessControls() : array;

    /**
     * @return string
     */
    public function getStrategy() : string;
}
