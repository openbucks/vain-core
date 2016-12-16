<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-connection
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-connection
 */
declare(strict_types = 1);

namespace Vain\Core\Connection\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Decorator\AbstractConnectionDecorator;

/**
 * Class ConnectionLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionLoggerDecorator extends AbstractConnectionDecorator
{
    private $logger;

    /**
     * ConnectionLoggerDecorator constructor.
     *
     * @param ConnectionInterface $connection
     * @param LoggerInterface     $logger
     */
    public function __construct(ConnectionInterface $connection, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($connection);
    }

    /**
     * @inheritDoc
     */
    public function establish()
    {
        $this->logger->debug(sprintf('Establishing connection %s', $this->getConnection()->getName()));
        $connection = parent::establish();
        $this->logger->debug(sprintf('Successfully established connection %s', $this->getConnection()->getName()));

        return $connection;
    }
}
