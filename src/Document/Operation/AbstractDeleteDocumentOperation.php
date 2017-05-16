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
use Vain\Core\Document\Event\DeleteDocumentEvent;
use Vain\Core\Document\Result\CannotDeleteDocumentResult;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class AbstractDeleteDocumentOperation
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractDeleteDocumentOperation extends AbstractOperation
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
    abstract public function deleteDocument() : DocumentInterface;

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (null === ($document = $this->deleteDocument())) {
            return new CannotDeleteDocumentResult($document);
        }

        $this->eventDispatcher
            ->dispatch(new DeleteDocumentEvent($this->eventResolver->createName('document', 'delete'), $document))
            ->dispatch(
                new DeleteDocumentEvent($this->eventResolver->createName($document->getDocumentName(), 'delete'), $document)
            );

        return new SuccessfulResult();
    }
}
