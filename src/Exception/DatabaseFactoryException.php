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

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Database\Factory\DatabaseFactoryInterface;

/**
 * Class DatabaseFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DatabaseFactoryException extends AbstractCoreException
{
    private $databaseFactory;

    /**
     * DatabaseFactoryException constructor.
     *
     * @param DatabaseFactoryInterface $databaseFactory
     * @param string                   $message
     * @param int                      $code
     * @param \Exception|null          $previous
     */
    public function __construct(
        DatabaseFactoryInterface $databaseFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->databaseFactory = $databaseFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return DatabaseFactoryInterface
     */
    public function getDatabaseFactory(): DatabaseFactoryInterface
    {
        return $this->databaseFactory;
    }
}
