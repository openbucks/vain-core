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

use Vain\Core\Security\Voter\Strategy\SecurityVoterStrategyInterface;
use Vain\Core\Security\Voter\Strategy\Storage\SecurityVoterStrategyStorageInterface;

/**
 * Class DuplicateVoterStrategyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateVoterStrategyException extends VoterStrategyStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateVoterStrategyException constructor.
     *
     * @param SecurityVoterStrategyStorageInterface $strategyStorage
     * @param string                                $name
     * @param SecurityVoterStrategyInterface        $new
     * @param SecurityVoterStrategyInterface        $old
     */
    public function __construct(
        SecurityVoterStrategyStorageInterface $strategyStorage,
        string $name,
        SecurityVoterStrategyInterface $new,
        SecurityVoterStrategyInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $strategyStorage,
            sprintf(
                'Trying to register voter strategy %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return SecurityVoterStrategyInterface
     */
    public function getNew() : SecurityVoterStrategyInterface
    {
        return $this->new;
    }

    /**
     * @return SecurityVoterStrategyInterface
     */
    public function getOld() : SecurityVoterStrategyInterface
    {
        return $this->old;
    }
}
