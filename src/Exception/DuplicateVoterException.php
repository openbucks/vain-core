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

use Vain\Core\Security\Voter\SecurityVoterInterface;
use Vain\Core\Security\Voter\Storage\SecurityVoterStorageInterface;

/**
 * Class DuplicateVoterException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateVoterException extends VoterStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateVoterException constructor.
     *
     * @param SecurityVoterStorageInterface $voterStorage
     * @param string                        $name
     * @param SecurityVoterInterface        $new
     * @param SecurityVoterInterface        $old
     */
    public function __construct(
        SecurityVoterStorageInterface $voterStorage,
        string $name,
        SecurityVoterInterface $new,
        SecurityVoterInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $voterStorage,
            sprintf(
                'Trying to register voter %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return SecurityVoterInterface
     */
    public function getNew() : SecurityVoterInterface
    {
        return $this->new;
    }

    /**
     * @return SecurityVoterInterface
     */
    public function getOld() : SecurityVoterInterface
    {
        return $this->old;
    }
}
