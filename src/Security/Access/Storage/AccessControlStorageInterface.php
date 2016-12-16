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

namespace Vain\Core\Security\Access\Storage;

use Vain\Core\Security\Access\AccessControlInterface;

/**
 * Interface AccessControlStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface AccessControlStorageInterface
{
    /**
     * @param AccessControlInterface $accessControl
     *
     * @return AccessControlStorageInterface
     */
    public function addAcl(AccessControlInterface $accessControl) : AccessControlStorageInterface;

    /**
     * @param string $name
     *
     * @return AccessControlInterface
     */
    public function getAcl(string $name) : AccessControlInterface;
}
