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

namespace Vain\Core\Queue\Message\Factory;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Queue\Message\QueueMessageInterface;

/**
 * Interface QueueMessageFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface QueueMessageFactoryInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @param string         $source
     * @param string         $destination
     * @param ArrayInterface $content
     *
     * @return QueueMessageInterface
     */
    public function createMessage(string $source, string $destination, ArrayInterface $content) : QueueMessageInterface;

    /**
     * @param array $serializedMessage
     *
     * @return QueueMessageInterface
     */
    public function createFromArray(array $serializedMessage) : QueueMessageInterface;
}
