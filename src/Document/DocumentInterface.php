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
use Vain\Core\Equal\EquatableInterface;
use Vain\Core\PrivateX\PrivateInterface;

/**
 * Class DocumentInterface
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
interface DocumentInterface extends DisplayableInterface, PrivateInterface, EquatableInterface, ArrayInterface
{
    /**
     * @return string
     */
    public function getPrimaryKey();

    /**
     * @return string
     */
    public function getDocumentName() : string;

    /**
     * @return array
     */
    public function toRecord() : array;
}
