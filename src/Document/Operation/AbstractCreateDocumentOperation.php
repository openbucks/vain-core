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
use Vain\Core\Document\Event\CreateDocumentEvent;
use Vain\Core\Document\Result\CannotCreateDocumentResult;
use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class AbstractCreateDocumentOperation
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractCreateDocumentOperation extends AbstractOperation
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
    abstract public function createDocument() : DocumentInterface;

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        if (null === ($document = $this->createDocument())) {
            return new CannotCreateDocumentResult($document);
        }

        $this->eventDispatcher
            ->dispatch(
                new CreateDocumentEvent(
                    $this->eventResolver->createName('document', 'create'),
                    $document
                )
            )
            ->dispatch(
                new CreateDocumentEvent(
                    $this->eventResolver->createName($document->getDocumentName(), 'create'),
                    $document
                )
            );

        return new SuccessfulResult();
    }
}
