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

namespace Vain\Core\Security\Voter\Storage;

use Vain\Core\Security\Voter\SecurityVoterInterface;

/**
 * Interface SecurityVoterStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityVoterStorageInterface
{
    /**
     * @param SecurityVoterInterface $voter
     *
     * @return SecurityVoterStorageInterface
     */
    public function addVoter(SecurityVoterInterface $voter) : SecurityVoterStorageInterface;

    /**
     * @param string $voterName
     *
     * @return SecurityVoterInterface
     */
    public function getVoter(string $voterName) : SecurityVoterInterface;
}
