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

use Vain\Core\Name\Storage\AbstractNameableStorage;
use Vain\Core\Security\Access\AccessControlInterface;

/**
 * Class AccessControlStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method AccessControlInterface getItem(string $name)
 */
class AccessControlStorage extends AbstractNameableStorage implements AccessControlStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getAcl(string $name) : AccessControlInterface
    {
        return $this->getItem($name);
    }
}
