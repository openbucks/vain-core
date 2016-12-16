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

namespace Vain\Core\Queue\Factory;

use Vain\Core\Queue\Message\Factory\Storage\QueueMessageFactoryStorageInterface;

/**
 * Class AbstractQueueFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractQueueFactory implements QueueFactoryInterface
{
    private $name;

    private $factoryStorage;

    /**
     * AbstractQueueFactory constructor.
     *
     * @param string                              $name
     * @param QueueMessageFactoryStorageInterface $factoryStorage
     */
    public function __construct(string $name, QueueMessageFactoryStorageInterface $factoryStorage)
    {
        $this->name = $name;
        $this->factoryStorage = $factoryStorage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return QueueMessageFactoryStorageInterface
     */
    public function getFactoryStorage(): QueueMessageFactoryStorageInterface
    {
        return $this->factoryStorage;
    }
}
