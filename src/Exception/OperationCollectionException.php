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

use Vain\Core\Operation\Collection\OperationCollectionInterface;

/**
 * Class OperationCollectionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationOperationCollectionException extends OperationException
{
    private $collection;

    /**
     * VainOperationOperationCollectionException constructor.
     *
     * @param OperationCollectionInterface $collection
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        OperationCollectionInterface $collection,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->collection = $collection;
        parent::__construct($collection, $message, $code, $previous);
    }

    /**
     * @return OperationCollectionInterface
     */
    public function getCollection() : OperationCollectionInterface
    {
        return $this->collection;
    }
}
