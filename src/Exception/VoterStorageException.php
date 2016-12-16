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
use Vain\Core\Security\Voter\Storage\SecurityVoterStorageInterface;

/**
 * Class VoterStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class VoterStorageException extends AbstractCoreException
{
    private $voterStorage;

    /**
     * VoterStorageException constructor.
     *
     * @param SecurityVoterStorageInterface $voterStorage
     * @param string                        $message
     * @param int                           $code
     * @param \Exception|null               $previous
     */
    public function __construct(
        SecurityVoterStorageInterface $voterStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->voterStorage = $voterStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return SecurityVoterStorageInterface
     */
    public function getVoterStorage(): SecurityVoterStorageInterface
    {
        return $this->voterStorage;
    }
}
