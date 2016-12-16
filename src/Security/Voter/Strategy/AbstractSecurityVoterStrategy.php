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

namespace Vain\Core\Security\Voter\Strategy;

use Vain\Core\Api\Resource\ApiResourceInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;
use Vain\Core\Security\Voter\Storage\SecurityVoterStorageInterface;

/**
 * Class AbstractSecurityVoterStrategy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSecurityVoterStrategy implements SecurityVoterStrategyInterface
{
    private $voterStorage;

    /**
     * AbstractSecurityVoterStrategy constructor.
     *
     * @param SecurityVoterStorageInterface $voterStorage
     */
    public function __construct(SecurityVoterStorageInterface $voterStorage)
    {
        $this->voterStorage = $voterStorage;
    }

    /**
     * @return SecurityVoterStorageInterface
     */
    public function getVoterStorage(): SecurityVoterStorageInterface
    {
        return $this->voterStorage;
    }

    /**
     * @param string                 $voterName
     * @param array                  $voterConfig
     * @param SecurityTokenInterface $token
     * @param ApiResourceInterface      $resource
     *
     * @return int
     */
    public function checkSingle(
        string $voterName,
        array $voterConfig,
        SecurityTokenInterface $token,
        ApiResourceInterface $resource
    ) : int
    {
        return $this->voterStorage
            ->getVoter($voterName)
            ->vote($voterConfig, $token, $resource);
    }
}
