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

namespace Vain\Core\Security\Processor\Strategy\Storage;

use Vain\Core\Security\Processor\Strategy\SecurityProcessorStrategyInterface;

/**
 * Interface SecurityProcessorStrategyStorageInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface SecurityProcessorStrategyStorageInterface
{
    /**
     * @param string $strategyName
     *
     * @return SecurityProcessorStrategyInterface
     */
    public function getStrategy(string $strategyName) : SecurityProcessorStrategyInterface;
}
