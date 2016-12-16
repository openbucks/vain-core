<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-queue
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-queue
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Queue\QueueInterface;

/**
 * Class QueueException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class QueueException extends AbstractCoreException
{
    private $queue;

    /**
     * QueueException constructor.
     *
     * @param QueueInterface  $queue
     * @param string          $message
     * @param int             $code
     * @param \Exception|null $previous
     */
    public function __construct(QueueInterface $queue, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->queue = $queue;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return QueueInterface
     */
    public function getQueue(): QueueInterface
    {
        return $this->queue;
    }
}
