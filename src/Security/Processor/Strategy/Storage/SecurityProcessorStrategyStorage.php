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

namespace Vain\Core\Security\Processor\Strategy\Storage;

use Vain\Core\Name\Storage\AbstractNameableStorage;
use Vain\Core\Security\Processor\Strategy\SecurityProcessorStrategyInterface;

/**
 * Class SecurityProcessorStrategyStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method SecurityProcessorStrategyInterface getItem(string $name)
 */
class SecurityProcessorStrategyStorage extends AbstractNameableStorage implements
    SecurityProcessorStrategyStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getStrategy(string $strategyName) : SecurityProcessorStrategyInterface
    {
        return $this->getItem($strategyName);
    }
}
