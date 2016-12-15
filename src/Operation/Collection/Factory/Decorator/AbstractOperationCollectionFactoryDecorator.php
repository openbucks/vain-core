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

namespace Vain\Core\Operation\Collection\Factory\Decorator;

use Vain\Core\Operation\Collection\OperationCollectionInterface;
use Vain\Core\Operation\Collection\Factory\OperationCollectionFactoryInterface;

/**
 * Class AbstractOperationCollectionFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AbstractOperationCollectionFactoryDecorator implements OperationCollectionFactoryInterface
{
    private $collectionFactory;

    /**
     * AbstractOperationCollectionFactoryDecorator constructor.
     *
     * @param OperationCollectionFactoryInterface $collectionFactory
     */
    public function __construct(OperationCollectionFactoryInterface $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return OperationCollectionFactoryInterface
     */
    public function getCollectionFactory() : OperationCollectionFactoryInterface
    {
        return $this->collectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function create(array $operations = []) : OperationCollectionInterface
    {
        return $this->collectionFactory->create($operations);
    }
}
