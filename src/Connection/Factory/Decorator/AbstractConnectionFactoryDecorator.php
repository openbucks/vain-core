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

namespace Vain\Core\Connection\Factory\Decorator;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Factory\ConnectionFactoryInterface;

/**
 * Class AbstractConnectionFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractConnectionFactoryDecorator implements ConnectionFactoryInterface
{
    private $connectionFactory;

    /**
     * AbstractConnectionFactoryDecorator constructor.
     *
     * @param ConnectionFactoryInterface $connectionFactory
     */
    public function __construct(ConnectionFactoryInterface $connectionFactory)
    {
        $this->connectionFactory = $connectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->connectionFactory->getName();
    }

    /**
     * @inheritDoc
     */
    public function createConnection(array $config) : ConnectionInterface
    {
        return $this->connectionFactory->createConnection($config);
    }
}
