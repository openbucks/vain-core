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

use Vain\Core\Security\Processor\Strategy\Storage\SecurityProcessorStrategyStorageInterface;

/**
 * Class UnknownProcessorStrategyException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownProcessorStrategyException extends ProcessorStrategyStorageException
{
    /**
     * UnknownProcessorStrategyException constructor.
     *
     * @param SecurityProcessorStrategyStorageInterface $strategyStorage
     * @param string                        $name
     */
    public function __construct(SecurityProcessorStrategyStorageInterface $strategyStorage, string $name)
    {
        parent::__construct($strategyStorage, sprintf('Unknown security processor strategy %s', $name));
    }
}
