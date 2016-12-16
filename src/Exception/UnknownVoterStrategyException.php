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

namespace Vain\Core\Exception;

use Vain\Core\Security\Voter\Strategy\Storage\SecurityVoterStrategyStorageInterface;

/**
 * Class UnknownVoterStrategyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownVoterStrategyException extends VoterStrategyStorageException
{
    /**
     * UnknownVoterStrategyException constructor.
     *
     * @param SecurityVoterStrategyStorageInterface $strategyStorage
     * @param string                                $name
     */
    public function __construct(SecurityVoterStrategyStorageInterface $strategyStorage, string $name)
    {
        parent::__construct($strategyStorage, sprintf('Unknown voter strategy %s', $name));
    }
}
