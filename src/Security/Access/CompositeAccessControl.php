<?php
/**
 * Vainyl
 *
 * PHP Version 7
 *
 * @package   Vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://vainyl.com
 */
declare(strict_types=1);

namespace Vain\Core\Security\Access;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Access\Storage\AccessControlStorageInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class CompositeAccessControl
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CompositeAccessControl extends AbstractAccessControl
{
    /**
     * @var AccessControlStorageInterface
     */
    private $storage;

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'composite';
    }

    /**
     * @param AccessControlStorageInterface $storage
     *
     * @return AccessControlInterface
     */
    public function setStorage(AccessControlStorageInterface $storage): AccessControlInterface
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function doIsAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ): bool {
        foreach ($accessConfigData as $singleConfigData) {
            if (false === $this->storage
                    ->getAcl($singleConfigData['name'])
                    ->isAllowed(
                        $singleConfigData['config'],
                        $token,
                        $request
                    )
            ) {
                return false;
            }
        }

        return true;
    }
}