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

namespace Vain\Core\Document\Event;

use Vain\Core\Document\DocumentInterface;

/**
 * Class UpdateDocumentEvent
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
class UpdateDocumentEvent extends AbstractDocumentEvent implements UpdateDocumentEventInterface
{
    private $oldDocument;

    /**
     * UpdateDocumentEvent constructor.
     *
     * @param string          $name
     * @param DocumentInterface $document
     * @param DocumentInterface $oldDocument
     */
    public function __construct($name, DocumentInterface $document, DocumentInterface $oldDocument)
    {
        $this->oldDocument = $oldDocument;
        parent::__construct($name, $document);
    }

    /**
     * @inheritDoc
     */
    public function getOldDocument() : DocumentInterface
    {
        return $this->oldDocument;
    }

    /**
     * @inheritDoc
     */
    public function getNewDocument() : DocumentInterface
    {
        return $this->getDocument();
    }
}
