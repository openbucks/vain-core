<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Resource;

use Vain\Core\Security\User\SecurityUserInterface;

/**
 * Class AbstractApiResource
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApiResource implements ApiResourceInterface
{
    /**
     * @return SecurityUserInterface
     */
    abstract public function getOwner() : SecurityUserInterface;

    /**
     * @inheritDoc
     */
    public function isOwnedBy(SecurityUserInterface $user) : bool
    {
        return $this->getOwner()->equals($user);
    }

    /**
     * @inheritDoc
     */
    public function isConformedTo(SecurityUserInterface $user) : bool
    {
        foreach ($user->getSubordinates() as $userSubordinate) {
            if (false === $this->isOwnedBy($userSubordinate)) {
                continue;
            }

            return true;
        }

        return false;
    }
}