<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-database
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-database
 */

namespace Vain\Core\Connection\Factory;

/**
 * Class AbstractConnectionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractConnectionFactory implements ConnectionFactoryInterface
{
    private $configData;

    /**
     * AbstractConnectionFactory constructor.
     *
     * @param \ArrayAccess $configData
     */
    public function __construct(\ArrayAccess $configData)
    {
        $this->configData = $configData;
    }

    /**
     * @return array
     */
    public function getConfigData(string $connectionName) : array
    {
        return $this->configData['connections'][$connectionName];
    }
}
