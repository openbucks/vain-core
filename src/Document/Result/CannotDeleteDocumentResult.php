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

/**
 * Class CannotDeleteDocumentResult
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
class CannotDeleteDocumentResult extends AbstractDocumentFailedResult
{
    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return sprintf('Cannot delete document %s', $this->getDocument()->getDocumentName());
    }
}
