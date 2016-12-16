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

namespace Vain\Core\Security\Token\Storage;

use Vain\Core\Name\Storage\AbstractNameableStorage;
use Vain\Core\Security\Token\Provider\SecurityTokenProviderInterface;

/**
 * Class SecurityTokenStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method SecurityTokenProviderInterface getItem(string $name)
 */
class SecurityTokenStorage extends AbstractNameableStorage implements SecurityTokenStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getProvider(string $authType) : SecurityTokenProviderInterface
    {
        return $this->getItem($authType);
    }
}
