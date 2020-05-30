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

/**
 * Class RollbackOperationCollectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RollbackOperationCollectionException extends TransactionOperationCollectionException
{
    /**
     * CommitOperationCollectionException constructor.
     *
     * @param OperationCollectionInterface $collection
     * @param DatabaseInterface   $database
     */
    public function __construct(OperationCollectionInterface $collection, DatabaseInterface $database)
    {
        parent::__construct(
            $collection,
            $database,
            'Unable to rollback transaction after collection execution'
        );
    }
}
