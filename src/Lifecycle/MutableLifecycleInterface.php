<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-time
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-time
 */
declare(strict_types = 1);

namespace Vain\Core\Lifecycle;

use Vain\Core\Time\TimeInterface;

/**
 * Interface MutableLifecycleInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface MutableLifecycleInterface extends LifecycleInterface
{
    /**
     * @return TimeInterface
     */
    public function getUpdatedAt() : TimeInterface;
}
