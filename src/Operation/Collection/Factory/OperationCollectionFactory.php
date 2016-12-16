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

namespace Vain\Core\Operation\Collection\Factory;

use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;
use Vain\Core\Operation\Collection\OperationCollection;
use Vain\Core\Operation\Collection\OperationCollectionInterface;

/**
 * Class CollectionFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationCollectionFactory implements OperationCollectionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(array $operations = []) : OperationCollectionInterface
    {
        return new OperationCollection($operations);
    }
}
