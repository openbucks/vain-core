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

use Vain\Core\Name\NameableInterface;
use Vain\Core\Api\Resource\ApiResourceInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Interface SecurityVoterStrategyInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityVoterStrategyInterface extends NameableInterface
{
    /**
     * @param array                  $voterConfigs
     * @param SecurityTokenInterface $token
     * @param ApiResourceInterface      $resource
     *
     * @return bool
     */
    public function decide(array $voterConfigs, SecurityTokenInterface $token, ApiResourceInterface $resource) : bool;
}
