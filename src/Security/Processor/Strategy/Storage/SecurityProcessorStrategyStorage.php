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

use Vain\Core\Exception\DuplicateProcessorStrategyException;
use Vain\Core\Exception\UnknownProcessorStrategyException;
use Vain\Core\Security\Processor\Strategy\SecurityProcessorStrategyInterface;

/**
 * Class SecurityProcessorStrategyStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityProcessorStrategyStorage implements SecurityProcessorStrategyStorageInterface
{
    private $strategies = [];

    /**
     * SecurityProcessorStrategyStorage constructor.
     *
     * @param SecurityProcessorStrategyInterface[] $strategies
     */
    public function __construct(array $strategies = [])
    {
        foreach ($strategies as $processorStrategy) {
            $this->addStrategy($processorStrategy);
        }
    }

    /**
     * @inheritDoc
     */
    public function addStrategy(SecurityProcessorStrategyInterface $strategy
    ) : SecurityProcessorStrategyStorageInterface
    {
        $name = $strategy->getName();
        if (array_key_exists($name, $this->strategies)) {
            throw new DuplicateProcessorStrategyException($this, $name, $strategy, $this->strategies[$name]);
        }
        $this->strategies[$name] = $strategy;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStrategy(string $name) : SecurityProcessorStrategyInterface
    {
        if (false === array_key_exists($name, $this->strategies)) {
            throw new UnknownProcessorStrategyException($this, $name);
        }

        return $this->strategies[$name];
    }
}
