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

namespace Vain\Core\Security\Role;

use Vain\Core\Equal\EquatableInterface;
use Vain\Core\Name\NameableInterface;
use Vain\Core\PrivateX\PrivateInterface;

/**
 * Interface SecurityRoleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityRoleInterface extends PrivateInterface, EquatableInterface, NameableInterface
{

}