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

namespace Vain\Core\Security\Voter\Storage;

use Vain\Core\Name\Storage\AbstractNameableStorage;
use Vain\Core\Security\Voter\SecurityVoterInterface;

/**
 * Class SecurityVoterStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method SecurityVoterInterface getItem(string $name)
 */
class SecurityVoterStorage extends AbstractNameableStorage implements SecurityVoterStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getVoter(string $voterName) : SecurityVoterInterface
    {
        return $this->getItem($voterName);
    }
}
