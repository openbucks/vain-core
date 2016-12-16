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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Security\Processor\Strategy\Storage\SecurityProcessorStrategyStorageInterface;

/**
 * Class ProcessorStrategyStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ProcessorStrategyStorageException extends AbstractCoreException
{
    private $strategyStorage;

    /**
     * ProcessorStrategyStorageException constructor.
     *
     * @param SecurityProcessorStrategyStorageInterface $strategyStorage
     * @param string                                    $message
     * @param int                                       $code
     * @param \Exception|null                           $previous
     */
    public function __construct(
        SecurityProcessorStrategyStorageInterface $strategyStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->strategyStorage = $strategyStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return SecurityProcessorStrategyStorageInterface
     */
    public function getStrategyStorage(): SecurityProcessorStrategyStorageInterface
    {
        return $this->strategyStorage;
    }
}
