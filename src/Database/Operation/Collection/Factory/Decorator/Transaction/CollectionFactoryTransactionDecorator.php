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

namespace Vain\Core\Database\Operation\Collection\Factory\Decorator\Transaction;

use Vain\Core\Database\DatabaseInterface;
use Vain\Core\Database\Mvcc\MvccDatabaseInterface;
use Vain\Core\Database\Operation\Collection\Decorator\Transaction\CollectionTransactionDecorator;
use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;
use Vain\Core\Operation\Collection\Factory\Decorator\AbstractOperationCollectionFactoryDecorator;

/**
 * Class CollectionFactoryTransactionDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class CollectionFactoryTransactionDecorator extends AbstractOperationCollectionFactoryDecorator
{
    private $database;

    /**
     * CollectionFactoryTransactionDecorator constructor.
     *
     * @param OperationCollectionFactoryInterface $collectionFactory
     * @param MvccDatabaseInterface      $database
     */
    public function __construct(OperationCollectionFactoryInterface $collectionFactory, MvccDatabaseInterface $database)
    {
        $this->database = $database;
        parent::__construct($collectionFactory);
    }

    /**
     * @return DatabaseInterface
     */
    public function getDatabase() : DatabaseInterface
    {
        return $this->database;
    }

    /**
     * @inheritDoc
     */
    public function create(array $operations = []) : OperationCollectionInterface
    {
        $collection = parent::create($operations);

        return new CollectionTransactionDecorator($collection, $this->database);
    }
}
