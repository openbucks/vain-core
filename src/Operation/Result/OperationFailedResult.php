<?php

namespace Vain\Core\Operation\Result;

use Vain\Core\Operation\OperationInterface;
use Vain\Core\Result\AbstractFailedResult;

/**
 * Class OperationFailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationFailedResult extends AbstractFailedResult
{
    private $operation;

    /**
     * OperationFailedResult constructor.
     *
     * @param OperationInterface $operation
     */
    public function __construct(OperationInterface $operation)
    {
        $this->operation = $operation;
        parent::__construct();
    }

    /**
     * @return OperationInterface
     */
    public function getOperation(): OperationInterface
    {
        return $this->operation;
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf('Cannot execute operation %s', $this->operation->getName());
    }
}