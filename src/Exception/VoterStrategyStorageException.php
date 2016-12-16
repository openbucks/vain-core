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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Security\Voter\Strategy\Storage\SecurityVoterStrategyStorageInterface;

/**
 * Class VoterStrategyStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class VoterStrategyStorageException extends AbstractCoreException
{
    private $strategyStorage;

    /**
     * VoterStorageException constructor.
     *
     * @param SecurityVoterStrategyStorageInterface $strategyStorage
     * @param string                                $message
     * @param int                                   $code
     * @param \Exception|null                       $previous
     */
    public function __construct(
        SecurityVoterStrategyStorageInterface $strategyStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->strategyStorage = $strategyStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return SecurityVoterStrategyStorageInterface
     */
    public function getStrategyStorage(): SecurityVoterStrategyStorageInterface
    {
        return $this->strategyStorage;
    }
}
