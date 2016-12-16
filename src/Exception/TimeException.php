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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Time\TimeInterface;

/**
 * Class TimeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TimeException extends AbstractCoreException
{
    private $time;

    /**
     * TimeException constructor.
     *
     * @param TimeInterface $time
     * @param string        $message
     * @param int           $code
     * @param \Exception    $previous
     */
    public function __construct(TimeInterface $time, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->time = $time;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return TimeInterface
     */
    public function getTime(): TimeInterface
    {
        return $this->time;
    }
}