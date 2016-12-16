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

namespace Vain\Core\Connection\Factory\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Decorator\Logger\ConnectionLoggerDecorator;
use Vain\Core\Connection\Factory\ConnectionFactoryInterface;
use Vain\Core\Connection\Factory\Decorator\AbstractConnectionFactoryDecorator;

/**
 * Class ConnectionFactoryLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionFactoryLoggerDecorator extends AbstractConnectionFactoryDecorator
{
    private $logger;

    /**
     * ConnectionFactoryLoggerDecorator constructor.
     *
     * @param ConnectionFactoryInterface $connectionFactory
     * @param LoggerInterface            $logger
     */
    public function __construct(ConnectionFactoryInterface $connectionFactory, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($connectionFactory);
    }

    /**
     * @inheritDoc
     */
    public function createConnection(string $connectionName) : ConnectionInterface
    {
        $this->logger->debug(
            sprintf(
                'Creating connection %s with config %s',
                $this->getName(),
                json_encode($this->getConfigData($connectionName))
            )
        );

        return new ConnectionLoggerDecorator(parent::createConnection($connectionName), $this->logger);
    }
}
