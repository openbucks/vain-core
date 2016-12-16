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

namespace Vain\Core\Security\Voter;

use Vain\Core\Name\NameableInterface;
use Vain\Core\Api\Resource\ApiResourceInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface SecurityVoterInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityVoterInterface extends NameableInterface
{
    /**
     * @param array                  $voterConfig
     * @param SecurityTokenInterface $token
     * @param ApiResourceInterface      $resource
     *
     * @return int
     */
    public function vote(array $voterConfig, SecurityTokenInterface $token, ApiResourceInterface $resource) : int;
}
