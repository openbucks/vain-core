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

namespace Vain\Core\Connection\Factory\Decorator\Proxy;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Connection\Factory\Decorator\AbstractConnectionFactoryDecorator;
use Vain\Core\Connection\Proxy\ConnectionProxy;

/**
 * Class ConnectionFactoryProxyDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionFactoryProxyDecorator extends AbstractConnectionFactoryDecorator
{
    /**
     * @inheritDoc
     */
    public function createConnection(string $connectionName) : ConnectionInterface
    {
        return new ConnectionProxy(parent::createConnection($connectionName));
    }
}
