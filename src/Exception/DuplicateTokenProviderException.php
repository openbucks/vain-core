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

use Vain\Core\Security\Token\Provider\SecurityTokenProviderInterface;
use Vain\Core\Security\Token\Storage\SecurityTokenStorageInterface;

/**
 * Class DuplicateTokenProviderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateTokenProviderException extends TokenStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateTokenProviderException constructor.
     *
     * @param SecurityTokenStorageInterface  $tokenStorage
     * @param string                         $name
     * @param SecurityTokenProviderInterface $new
     * @param SecurityTokenProviderInterface $old
     */
    public function __construct(
        SecurityTokenStorageInterface $tokenStorage,
        string $name,
        SecurityTokenProviderInterface $new,
        SecurityTokenProviderInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $tokenStorage,
            sprintf(
                'Trying to register token provider %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return SecurityTokenProviderInterface
     */
    public function getNew() : SecurityTokenProviderInterface
    {
        return $this->new;
    }

    /**
     * @return SecurityTokenProviderInterface
     */
    public function getOld() : SecurityTokenProviderInterface
    {
        return $this->old;
    }
}
