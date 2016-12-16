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

use Vain\Core\Api\Resource\Provider\ApiResourceProviderInterface;
use Vain\Core\Security\Resource\Provider\Storage\ResourceProviderStorageInterface;

/**
 * Class DuplicateResourceProviderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateResourceProviderException extends ResourceProviderException
{
    private $new;

    private $old;

    /**
     * DuplicateVoterStrategyException constructor.
     *
     * @param ResourceProviderStorageInterface $providerStorage
     * @param string                           $name
     * @param ApiResourceProviderInterface        $new
     * @param ApiResourceProviderInterface        $old
     */
    public function __construct(
        ResourceProviderStorageInterface $providerStorage,
        string $name,
        ApiResourceProviderInterface $new,
        ApiResourceProviderInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $providerStorage,
            sprintf(
                'Trying to register resource provider %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return ApiResourceProviderInterface
     */
    public function getNew() : ApiResourceProviderInterface
    {
        return $this->new;
    }

    /**
     * @return ApiResourceProviderInterface
     */
    public function getOld() : ApiResourceProviderInterface
    {
        return $this->old;
    }
}
