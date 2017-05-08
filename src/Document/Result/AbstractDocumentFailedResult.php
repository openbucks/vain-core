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

namespace Vain\Core\Document\Result;

use Vain\Core\Document\DocumentInterface;
use Vain\Core\Result\AbstractFailedResult;

/**
 * Class AbstractDocumentFailedResult
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractDocumentFailedResult extends AbstractFailedResult
{
    private $document;

    /**
     * AbstractDocumentFailedResult constructor.
     *
     * @param DocumentInterface $document
     */
    public function __construct(DocumentInterface $document)
    {
        $this->document = $document;
        parent::__construct();
    }

    /**
     * @return DocumentInterface
     */
    public function getDocument(): DocumentInterface
    {
        return $this->document;
    }

    /**
     * @return array
     */
    public function toDisplay(): array
    {
        return array_merge(
            parent::toDisplay(),
            ['document' => $this->document->toDisplay(), 'message' => $this->__toString()]
        );
    }
}
