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

namespace Vain\Core\Document\Event\Handler;

use Vain\Core\Document\Event\DocumentEventInterface;

/**
 * Interface DeleteDocumentEventHandlerInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface DeleteDocumentEventHandlerInterface
{
    /**
     * @param DocumentEventInterface $event
     *
     * @return DeleteDocumentEventHandlerInterface
     */
    public function delete(DocumentEventInterface $event) : DeleteDocumentEventHandlerInterface;
}
