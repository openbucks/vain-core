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

use Vain\Core\Security\Voter\Strategy\SecurityVoterStrategyInterface;

/**
 * Interface SecurityVoterStrategyStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityVoterStrategyStorageInterface
{
    /**
     * @param SecurityVoterStrategyInterface $strategy
     *
     * @return SecurityVoterStrategyStorageInterface
     */
    public function addStrategy(SecurityVoterStrategyInterface $strategy) : SecurityVoterStrategyStorageInterface;

    /**
     * @param string $strategyName
     *
     * @return SecurityVoterStrategyInterface
     */
    public function getStrategy(string $strategyName) : SecurityVoterStrategyInterface;
}
