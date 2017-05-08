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
use Vain\Core\Event\AbstractEvent;

/**
 * Class AbstractDocumentEvent
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractDocumentEvent extends AbstractEvent implements DocumentEventInterface
{
    private $name;

    private $document;

    /**
     * AbstractDocumentEvent constructor.
     *
     * @param string          $name
     * @param DocumentInterface $document
     */
    public function __construct($name, DocumentInterface $document)
    {
        $this->name = $name;
        $this->document = $document;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getDocument() : DocumentInterface
    {
        return $this->document;
    }
}
