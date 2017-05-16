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

namespace Vain\Core\Document;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Display\DisplayableInterface;

/**
 * Class EmbeddedDocumentInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface EmbeddedDocumentInterface extends DisplayableInterface, ArrayInterface
{
    /**
     * @return string
     */
    public function getDocumentName() : string;

    /**
     * @return array
     */
    public function toRecord() : array;
}
