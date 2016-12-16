<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-operation
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Database\DatabaseInterface;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Exception\OperationCollectionException;

/**
 * Class TransactionOperationCollectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class TransactionOperationCollectionException extends OperationCollectionException
{
    private $database;

    /**
     * TransactionOperationCollectionException constructor.
     *
     * @param OperationCollectionInterface $collection
     * @param DatabaseInterface   $database
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        OperationCollectionInterface $collection,
        DatabaseInterface $database,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->database = $database;
        parent::__construct($collection, $message, $code, $previous);
    }

    /**
     * @return DatabaseInterface
     */
    public function getDatabase()
    {
        return $this->database;
    }
}
