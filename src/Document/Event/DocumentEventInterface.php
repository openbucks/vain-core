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
 * Interface DocumentEventInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface DocumentEventInterface
{
    /**
     * @return DocumentInterface
     */
    public function getDocument() : DocumentInterface;
}
