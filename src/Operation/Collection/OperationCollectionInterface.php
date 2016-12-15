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

use Vain\Core\Operation\OperationInterface;

/**
 * Interface OperationCollectionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface OperationCollectionInterface extends OperationInterface
{
    /**
     * @param OperationInterface $operation
     *
     * @return OperationCollectionInterface
     */
    public function add(OperationInterface $operation) : OperationCollectionInterface;
}
