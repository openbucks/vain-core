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

namespace Vain\Core\Security\Processor;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Config\SecurityConfigInterface;

/**
 * Interface SecurityProcessorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityProcessorInterface
{
    /**
     * @param SecurityConfigInterface $securityConfig
     * @param ServerRequestInterface  $request
     *
     * @return bool
     */
    public function isAllowed(SecurityConfigInterface $securityConfig, ServerRequestInterface $request) : bool;
}
