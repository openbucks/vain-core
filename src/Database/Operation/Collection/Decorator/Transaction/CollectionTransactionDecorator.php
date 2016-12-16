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

namespace Vain\Core\Database\Operation\Collection\Decorator\Transaction;

use Vain\Core\Database\DatabaseInterface;
use Vain\Core\Exception\CommitOperationCollectionException;
use Vain\Core\Exception\RollbackOperationCollectionException;
use Vain\Core\Database\Mvcc\MvccDatabaseInterface;
use Vain\Core\Operation\Collection\Decorator\AbstractOperationCollectionDecorator;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Result\ResultInterface;

/**
 * Class CollectionTransactionDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionTransactionDecorator extends AbstractOperationCollectionDecorator
{
    private $database;

    /**
     * CollectionTransactionDecorator constructor.
     *
     * @param OperationCollectionInterface   $collection
     * @param MvccDatabaseInterface $database
     */
    public function __construct(OperationCollectionInterface $collection, MvccDatabaseInterface $database)
    {
        $this->database = $database;
        parent::__construct($collection);
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        $this->database->startTransaction();
        $result = parent::execute();
        if (false === $result->getStatus()) {
            if (false === $this->database->rollbackTransaction()) {
                throw new RollbackOperationCollectionException($this, $this->database);
            }

            return $result;
        }

        if (false === $this->database->commitTransaction()) {
            throw new CommitOperationCollectionException($this, $this->database);
        }

        return $result;
    }

    /**
     * @return DatabaseInterface
     */
    public function getDatabase() : DatabaseInterface
    {
        return $this->database;
    }
}
