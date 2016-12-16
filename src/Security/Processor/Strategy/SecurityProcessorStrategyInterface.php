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

namespace Vain\Core\Security\Processor\Strategy;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Name\NameableInterface;
use Vain\Core\Security\Config\SecurityConfigInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface SecurityProcessorStrategyInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityProcessorStrategyInterface extends NameableInterface
{
    /**
     * @param SecurityConfigInterface $securityConfig
     * @param SecurityTokenInterface  $token
     * @param ServerRequestInterface  $request
     *
     * @return bool
     */
    public function decide(
        SecurityConfigInterface $securityConfig,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool;
}
