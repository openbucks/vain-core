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

namespace Vain\Core\Exception;

use Vain\Core\Time\TimeInterface;

/**
 * Class UnsupportedTimeZoneException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedTimeZoneException extends TimeException
{
    /**
     * UnsupportedTimeZoneException constructor.
     *
     * @param TimeInterface  $time
     * @param mixed $timeZone
     */
    public function __construct(TimeInterface $time, $timeZone)
    {
        parent::__construct($time, sprintf('Only TimeZone class is supported'));
    }
}