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

namespace Vain\Core\Time\Provider;

use Vain\Core\Time\TimeInterface;

/**
 * Interface TimeProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface TimeProviderInterface
{
    /**
     * @param string $timeZone
     *
     * @return TimeInterface
     */
    public function getCurrentTime(string $timeZone) : TimeInterface;
}