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

namespace Vain\Core\Document\Operation\Factory;

use Vain\Core\Document\DocumentInterface;
use Vain\Core\Operation\Factory\Decorator\AbstractOperationFactoryDecorator;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractDocumentOperationFactory
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractDocumentOperationFactory extends AbstractOperationFactoryDecorator implements
    DocumentOperationFactoryInterface
{

    /**
     * @param DocumentInterface $newDocument
     * @param DocumentInterface $oldDocument
     *
     * @return OperationInterface
     */
    abstract public function doUpdateOperation(
        DocumentInterface $newDocument,
        DocumentInterface $oldDocument
    ) : OperationInterface;

    /**
     * @inheritDoc
     */
    public function updateOperation(DocumentInterface $newDocument, DocumentInterface $oldDocument) : OperationInterface
    {
        if ($newDocument->equals($oldDocument)) {
            return $this->successful();
        }

        return $this->doUpdateOperation($newDocument, $oldDocument);
    }
}
