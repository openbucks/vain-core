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

namespace Vain\Core\Security\Access;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Name\NameableInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface AccessControlInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface AccessControlInterface extends NameableInterface
{
    /**
     * @param array                  $accessConfigData
     * @param SecurityTokenInterface $token
     * @param ServerRequestInterface $request
     *
     * @return bool
     */
    public function isAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool;
}
