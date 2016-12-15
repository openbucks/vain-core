<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Operation\Factory;

use Vain\Core\Operation\OperationInterface;

/**
 * Interface OperationFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface OperationFactoryInterface
{
    /**
     * @param OperationInterface $operation
     *
     * @return OperationInterface
     */
    public function decorate(OperationInterface $operation) : OperationInterface;

    /**
     * @return OperationInterface
     */
    public function successful() : OperationInterface;

    /**
     * @return OperationInterface
     */
    public function failed() : OperationInterface;
}