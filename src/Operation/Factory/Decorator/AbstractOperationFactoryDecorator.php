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

namespace Vain\Core\Operation\Factory\Decorator;

use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractOperationFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractOperationFactoryDecorator implements OperationFactoryInterface
{
    private $operationFactory;

    /**
     * AbstractOperationFactoryDecorator constructor.
     *
     * @param OperationFactoryInterface $operationFactory
     */
    public function __construct(OperationFactoryInterface $operationFactory)
    {
        $this->operationFactory = $operationFactory;
    }

    /**
     * @return OperationFactoryInterface
     */
    public function getOperationFactory() : OperationFactoryInterface
    {
        return $this->operationFactory;
    }

    /**
     * @inheritDoc
     */
    public function decorate(OperationInterface $operation) : OperationInterface
    {
        return $this->operationFactory->decorate($operation);
    }

    /**
     * @inheritDoc
     */
    public function successful() : OperationInterface
    {
        return $this->operationFactory->successful();
    }

    /**
     * @inheritDoc
     */
    public function failed() : OperationInterface
    {
        return $this->operationFactory->failed();
    }
}
