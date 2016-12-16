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
     * @param SecurityProcessorStrategyInterface $strategy
     *
     * @return SecurityProcessorStrategyStorageInterface
     */
    public function addStrategy(SecurityProcessorStrategyInterface $strategy
    ) : SecurityProcessorStrategyStorageInterface;

    /**
     * @param string $name
     *
     * @return SecurityProcessorStrategyInterface
     */
    public function getStrategy(string $name) : SecurityProcessorStrategyInterface;
}
