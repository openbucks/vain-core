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
use Vain\Core\Exception\DuplicateAccessControlException;
use Vain\Core\Exception\UnknownAccessControlException;

/**
 * Class AccessControlStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AccessControlStorage implements AccessControlStorageInterface
{
    private $accessControls = [];

    /**
     * AccessControlStorage constructor.
     *
     * @param AccessControlInterface[] $accessControls
     */
    public function __construct(array $accessControls = [])
    {
        foreach ($accessControls as $accessControl) {
            $this->addAcl($accessControl);
        }
    }

    /**
     * @inheritDoc
     */
    public function addAcl(AccessControlInterface $accessControl) : AccessControlStorageInterface
    {
        $name = $accessControl->getName();
        if (array_key_exists($name, $this->accessControls)) {
            throw new DuplicateAccessControlException($this, $name, $accessControl, $this->accessControls[$name]);
        }
        $this->accessControls[$name] = $accessControl;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getAcl(string $name) : AccessControlInterface
    {
        if (false === array_key_exists($name, $this->accessControls)) {
            throw new UnknownAccessControlException($this, $name);
        }

        return $this->accessControls[$name];
    }
}
