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
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class AbstractAccessControl
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractAccessControl implements AccessControlInterface
{
    /**
     * @param array                  $accessConfigData
     * @param SecurityTokenInterface $token
     * @param ServerRequestInterface $request
     *
     * @return bool
     */
    abstract public function doIsAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool;

    /**
     * @inheritDoc
     */
    public function isAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool
    {

        if (false === $this->doIsAllowed($accessConfigData, $token, $request)) {
            return false;
        }

        return true;
    }
}
