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

namespace Vain\Core\Document\Operation;

use Vain\Core\Document\DocumentInterface;
use Vain\Core\Document\Event\UpdateDocumentEvent;
use Vain\Core\Document\Result\CannotUpdateDocumentResult;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class AbstractUpdateDocumentOperation
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractUpdateDocumentOperation extends AbstractOperation
{
    private $eventResolver;

    private $eventDispatcher;

    /**
     * AbstractCreateDocumentOperation constructor.
     *
     * @param EventResolverInterface   $eventResolver
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventResolverInterface $eventResolver, EventDispatcherInterface $eventDispatcher)
    {
        $this->eventResolver = $eventResolver;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @return DocumentInterface
     */
    abstract public function getNewDocument() : DocumentInterface;

    /**
     * @return DocumentInterface
     */
    abstract public function getOldDocument() : DocumentInterface;

    /**
     * @param DocumentInterface $newDocument
     * @param DocumentInterface $oldDocument
     *
     * @return DocumentInterface
     */
    abstract public function updateDocument(DocumentInterface $newDocument, DocumentInterface $oldDocument) : DocumentInterface;

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (null === ($newDocument = $this->getNewDocument())) {
            return new CannotUpdateDocumentResult($newDocument);
        }

        if (null === ($oldDocument = $this->getOldDocument())) {
            return new CannotUpdateDocumentResult($newDocument);
        }

        if (null === ($this->updateDocument($newDocument, $oldDocument))) {
            return new CannotUpdateDocumentResult($newDocument);
        }

        $this->eventDispatcher
            ->dispatch(
                new UpdateDocumentEvent(
                    $this->eventResolver->createName('document', 'update'),
                    $oldDocument,
                    $newDocument
                )
            )
            ->dispatch(
                new UpdateDocumentEvent(
                    $this->eventResolver->createName($newDocument->getDocumentName(), 'update'),
                    $oldDocument,
                    $newDocument
                )
            );

        return new SuccessfulResult();
    }
}
