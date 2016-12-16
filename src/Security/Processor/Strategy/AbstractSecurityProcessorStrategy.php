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

namespace Vain\Core\Security\Processor\Strategy;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Access\Storage\AccessControlStorageInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class AbstractProcessorStrategy
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractSecurityProcessorStrategy implements SecurityProcessorStrategyInterface
{
    private $name;

    private $accessControlStorage;

    /**
     * AbstractProcessorStrategy constructor.
     *
     * @param string                        $name
     * @param AccessControlStorageInterface $accessControlStorage
     */
    public function __construct(string $name, AccessControlStorageInterface $accessControlStorage)
    {
        $this->name = $name;
        $this->accessControlStorage = $accessControlStorage;
    }

    /**
     * @return AccessControlStorageInterface
     */
    public function getAccessControlStorage(): AccessControlStorageInterface
    {
        return $this->accessControlStorage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string                 $aclName
     * @param array                  $accessConfig
     * @param SecurityTokenInterface $token
     * @param ServerRequestInterface $request
     *
     * @return bool
     */
    public function checkSingle(
        string $aclName,
        array $accessConfig,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool
    {
        return $this->accessControlStorage->getAcl($aclName)->isAllowed($accessConfig, $token, $request);
    }
}
