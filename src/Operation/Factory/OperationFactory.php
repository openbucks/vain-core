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

namespace Vain\Core\Operation\Factory;

use Vain\Core\Operation\Factory\OperationFactoryInterface;
use Vain\Core\Operation\Failed\FailedOperation;
use Vain\Core\Operation\OperationInterface;
use Vain\Core\Operation\Successful\SuccessfulOperation;

/**
 * Class TrustedOperationFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationFactory implements OperationFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function decorate(OperationInterface $operation) : OperationInterface
    {
        return $operation;
    }

    /**
     * @inheritDoc
     */
    public function successful() : OperationInterface
    {
        return new SuccessfulOperation();
    }

    /**
     * @inheritDoc
     */
    public function failed() : OperationInterface
    {
        return new FailedOperation();
    }
}
