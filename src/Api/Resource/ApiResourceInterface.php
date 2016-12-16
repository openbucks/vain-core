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

use Vain\Core\Display\DisplayableInterface;
use Vain\Core\Equal\EquatableInterface;
use Vain\Core\Security\User\SecurityUserInterface;

/**
 * Interface ApiResourceInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiResourceInterface extends DisplayableInterface, EquatableInterface
{
    /**
     * @param SecurityUserInterface $user
     *
     * @return bool
     */
    public function isOwnedBy(SecurityUserInterface $user) : bool;

    /**
     * @param SecurityUserInterface $user
     *
     * @return bool
     */
    public function isConformedTo(SecurityUserInterface $user) : bool;
}