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

namespace Vain\Core\Connection\Factory\Decorator\Assert;

use Vain\Core\Connection\ConnectionInterface;
use Vain\Core\Exception\NoRequiredFieldException;
use Vain\Core\Connection\Factory\ConnectionFactoryInterface;
use Vain\Core\Connection\Factory\Decorator\AbstractConnectionFactoryDecorator;

/**
 * Class ConnectionFactoryAssertDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConnectionFactoryAssertDecorator extends AbstractConnectionFactoryDecorator
{
    private $requiredFields;

    /**
     * ConnectionFactoryAssertDecorator constructor.
     *
     * @param ConnectionFactoryInterface $connectionFactory
     * @param array                      $requiredFields
     */
    public function __construct(ConnectionFactoryInterface $connectionFactory, array $requiredFields)
    {
        $this->requiredFields = $requiredFields;
        parent::__construct($connectionFactory);
    }

    /**
     * @inheritDoc
     */
    public function createConnection(string $connectionName) : ConnectionInterface
    {
        foreach ($this->requiredFields as $requiredField) {
            if (false === array_key_exists($requiredField, $this->getConfigData($connectionName))) {
                throw new NoRequiredFieldException($this, $requiredField);
            }
        }

        return parent::createConnection($connectionName);
    }
}
