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

namespace Vain\Core\Operation\Decorator;

use Vain\Core\Operation\OperationInterface;
use Vain\Core\Result\ResultInterface;

/**
 * Class AbstractOperationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractOperationDecorator implements OperationInterface
{
    private $operation;

    /**
     * AbstractVainOperationDecorator constructor.
     *
     * @param OperationInterface $operation
     */
    public function __construct(OperationInterface $operation)
    {
        $this->operation = $operation;
    }

    /**
     * @return OperationInterface
     */
    public function getOperation() : OperationInterface
    {
        return $this->operation;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->operation->getName();
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        return $this->operation->execute();
    }
}
