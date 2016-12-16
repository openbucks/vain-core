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

use Vain\Core\Exception\DuplicateVoterStrategyException;
use Vain\Core\Exception\UnknownVoterStrategyException;
use Vain\Core\Security\Voter\Strategy\SecurityVoterStrategyInterface;

/**
 * Class SecurityVoterStrategyStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityVoterStrategyStorage implements SecurityVoterStrategyStorageInterface
{
    private $strategies = [];

    /**
     * SecurityProcessorStrategyStorage constructor.
     *
     * @param SecurityVoterStrategyInterface[] $strategies
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
    public function addStrategy(SecurityVoterStrategyInterface $strategy
    ) : SecurityVoterStrategyStorageInterface
    {
        $name = $strategy->getName();
        if (array_key_exists($name, $this->strategies)) {
            throw new DuplicateVoterStrategyException($this, $name, $strategy, $this->strategies[$name]);
        }
        $this->strategies[$name] = $strategy;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStrategy(string $name) : SecurityVoterStrategyInterface
    {
        if (false === array_key_exists($name, $this->strategies)) {
            throw new UnknownVoterStrategyException($this, $name);
        }

        return $this->strategies[$name];
    }
}
