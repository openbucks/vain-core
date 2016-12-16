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

namespace Vain\Core\Connection\Storage\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Storage\ConnectionStorageInterface;
use Vain\Core\Connection\Storage\Decorator\AbstractConnectionStorageDecorator;

/**
 * Class ConnectionStorageLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionStorageLoggerDecorator extends AbstractConnectionStorageDecorator
{
    private $logger;

    /**
     * ConnectionStorageLoggerDecorator constructor.
     *
     * @param ConnectionStorageInterface $connectionStorage
     * @param LoggerInterface            $logger
     */
    public function __construct(ConnectionStorageInterface $connectionStorage, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($connectionStorage);
    }

    /**
     * @inheritDoc
     */
    public function getConnection(string $connectionName) : ConnectionInterface
    {
        $this->logger->debug(sprintf('Retrieving connection %s', $connectionName));

        return parent::getConnection($connectionName);
    }
}
