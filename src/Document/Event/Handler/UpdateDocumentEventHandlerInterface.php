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

use Vain\Core\Document\Event\UpdateDocumentEventInterface;

/**
 * Interface UpdateDocumentEventHandlerInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface UpdateDocumentEventHandlerInterface
{
    /**
     * @param UpdateDocumentEventInterface $event
     *
     * @return UpdateDocumentEventHandlerInterface
     */
    public function update(UpdateDocumentEventInterface $event) : UpdateDocumentEventHandlerInterface;
}
