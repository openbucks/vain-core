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

namespace Vain\Core\Security\Voter\Strategy\Storage;

use Vain\Core\Name\Storage\AbstractNameableStorage;
use Vain\Core\Security\Voter\Strategy\SecurityVoterStrategyInterface;

/**
 * Class SecurityVoterStrategyStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method SecurityVoterStrategyInterface getItem(string $name)
 */
class SecurityVoterStrategyStorage extends AbstractNameableStorage implements SecurityVoterStrategyStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getStrategy(string $strategyName) : SecurityVoterStrategyInterface
    {
        return $this->getItem($strategyName);
    }

}
