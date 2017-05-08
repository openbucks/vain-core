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
use Vain\Core\Equal\EquatableInterface;

/**
 * Class AbstractDocument
 *
 * @author Nazar Ivanenko <nivanenko@gmail.com>
 */
abstract class AbstractDocument implements DocumentInterface
{
    /**
     * @inheritDoc
     */
    public function equals(EquatableInterface $equatable) : bool
    {
        /**
         * @var DocumentInterface $equatable
         */

        return ($this->getPrimaryKey() === $equatable->getPrimaryKey())
               && ($this->getDocumentName() === $equatable->getDocumentName());
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data) : ArrayInterface
    {
        foreach ($data as $field => $value) {
            if (false === property_exists($this, $field)) {
                continue;
            }
            $this->{$field} = $value;
        }

        return $this;
    }
}
