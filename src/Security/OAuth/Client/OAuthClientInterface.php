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

namespace Vain\Core\Security\OAuth\Client;

use Vain\Core\Display\DisplayableInterface;
use Vain\Core\Equal\EquatableInterface;
use Vain\Core\PrivateX\PrivateInterface;
use Vain\Core\String\StringInterface;

/**
 * Class OAuthClientInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface OAuthClientInterface extends DisplayableInterface, EquatableInterface, PrivateInterface, StringInterface
{
    /**
     * @return string
     */
    public function getPublicKey() : string;
}
