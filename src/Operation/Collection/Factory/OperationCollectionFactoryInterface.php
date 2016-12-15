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

namespace Vain\Core\Operation\Collection\Factory;

use Vain\Core\Operation\Collection\OperationCollectionInterface;

/**
 * Interface OperationCollectionFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface OperationCollectionFactoryInterface
{
    /**
     * @param array $operations
     *
     * @return OperationCollectionInterface
     */
    public function create(array $operations = []) : OperationCollectionInterface;
}