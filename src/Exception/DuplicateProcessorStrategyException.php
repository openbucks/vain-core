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

use Vain\Core\Security\Processor\Strategy\SecurityProcessorStrategyInterface;
use Vain\Core\Security\Processor\Strategy\Storage\SecurityProcessorStrategyStorageInterface;

/**
 * Class DuplicateProcessorStrategyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateProcessorStrategyException extends ProcessorStrategyStorageException
{
    private $new;

    private $old;

    /**
     * DuplicateProcessorStrategyException constructor.
     *
     * @param SecurityProcessorStrategyStorageInterface $strategyStorage
     * @param string                                    $name
     * @param SecurityProcessorStrategyInterface        $new
     * @param SecurityProcessorStrategyInterface        $old
     */
    public function __construct(
        SecurityProcessorStrategyStorageInterface $strategyStorage,
        string $name,
        SecurityProcessorStrategyInterface $new,
        SecurityProcessorStrategyInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $strategyStorage,
            sprintf(
                'Trying to register security processor strategy %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return SecurityProcessorStrategyInterface
     */
    public function getNew() : SecurityProcessorStrategyInterface
    {
        return $this->new;
    }

    /**
     * @return SecurityProcessorStrategyInterface
     */
    public function getOld() : SecurityProcessorStrategyInterface
    {
        return $this->old;
    }
}
