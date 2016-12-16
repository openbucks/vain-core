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

use Vain\Core\Security\Voter\Storage\SecurityVoterStorageInterface;

/**
 * Class UnknownVoterException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownVoterException extends VoterStorageException
{
    /**
     * UnknownVoterException constructor.
     *
     * @param SecurityVoterStorageInterface $voterStorage
     * @param string                        $name
     */
    public function __construct(SecurityVoterStorageInterface $voterStorage, string $name)
    {
        parent::__construct($voterStorage, sprintf('Unknown voter %s', $name));
    }
}
