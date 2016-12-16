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

namespace Vain\Core\Connection\Exception;

use Vain\Core\Connection\Factory\ConnectionFactoryInterface;

/**
 * Class NoRequiredFieldException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoRequiredFieldException extends ConnectionFactoryException
{
    /**
     * NoRequiredFieldException constructor.
     *
     * @param ConnectionFactoryInterface $connectionFactory
     * @param string                     $requiredField
     */
    public function __construct(ConnectionFactoryInterface $connectionFactory, string $requiredField)
    {
        parent::__construct(
            $connectionFactory,
            sprintf(
                'Required field %s is missing from config for connection %s',
                $requiredField,
                $connectionFactory->getName()
            )
        );
    }
}
