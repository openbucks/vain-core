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

namespace Vain\Core\Operation\Collection;

use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;
use Vain\Core\Operation\OperationInterface;

/**
 * Class Collection
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationCollection extends AbstractOperation implements OperationCollectionInterface
{
    /**
     * @var OperationInterface[]
     */
    private $operations = [];

    /**
     * Collection constructor.
     *
     * @param OperationInterface[] $operations
     */
    public function __construct(array $operations = [])
    {
        foreach ($operations as $operation) {
            $this->add($operation);
        }
    }

    /**
     * @inheritDoc
     */
    public function add(OperationInterface $operation) : OperationCollectionInterface
    {
        $this->operations[] = $operation;

        return $this;
    }

    /**
     * @return OperationInterface[]
     */
    public function getOperations() : array
    {
        return $this->operations;
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        $result = new SuccessfulResult();

        foreach ($this->operations as $operation) {
            $result = $operation->execute();

            if (false === $result->getStatus()) {
                return $result;
            }
        }

        return $result;
    }
}
