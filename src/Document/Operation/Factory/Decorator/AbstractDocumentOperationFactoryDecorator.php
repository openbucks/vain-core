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

namespace Vain\Core\Document\Operation\Factory\Decorator;

use Vain\Core\Document\DocumentInterface;
use Vain\Core\Document\Operation\Factory\DocumentOperationFactoryInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractOperationFactoryDecorator
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractDocumentOperationFactoryDecorator implements DocumentOperationFactoryInterface
{
    private $documentOperationFactory;

    /**
     * AbstractDocumentOperationFactoryDecorator constructor.
     *
     * @param DocumentOperationFactoryInterface $documentOperationFactory
     */
    public function __construct(DocumentOperationFactoryInterface $documentOperationFactory)
    {
        $this->documentOperationFactory = $documentOperationFactory;
    }

    /**
     * @inheritDoc
     */
    public function createOperation(DocumentInterface $document) : OperationInterface
    {
        return $this->documentOperationFactory->createOperation($document);
    }

    /**
     * @inheritDoc
     */
    public function updateOperation(DocumentInterface $newDocument, DocumentInterface $oldDocument) : OperationInterface
    {
        return $this->documentOperationFactory->updateOperation($newDocument, $oldDocument);
    }

    /**
     * @inheritDoc
     */
    public function deleteOperation(DocumentInterface $document) : OperationInterface
    {
        return $this->documentOperationFactory->deleteOperation($document);
    }
}
