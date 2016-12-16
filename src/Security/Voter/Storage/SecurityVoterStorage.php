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

use Vain\Core\Exception\DuplicateVoterException;
use Vain\Core\Exception\UnknownVoterException;
use Vain\Core\Security\Voter\SecurityVoterInterface;

/**
 * Class SecurityVoterStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityVoterStorage implements SecurityVoterStorageInterface
{
    private $voters = [];

    /**
     * SecurityVoterStorage constructor.
     *
     * @param SecurityVoterInterface[] $voters
     */
    public function __construct(array $voters = [])
    {
        foreach ($voters as $voter) {
            $this->addVoter($voter);
        }
    }

    /**
     * @inheritDoc
     */
    public function addVoter(SecurityVoterInterface $voter) : SecurityVoterStorageInterface
    {
        $name = $voter->getName();
        if (array_key_exists($name, $this->voters)) {
            throw new DuplicateVoterException($this, $name, $voter, $this->voters[$name]);
        }
        $this->voters[$name] = $voter;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getVoter(string $voterName) : SecurityVoterInterface
    {
        if (false === array_key_exists($voterName, $this->voters)) {
            throw new UnknownVoterException($this, $voterName);
        }

        return $this->voters[$voterName];
    }
}
