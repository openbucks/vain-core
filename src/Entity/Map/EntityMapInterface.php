<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-entity
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-entity
 */
declare(strict_types = 1);

namespace Vain\Core\Entity\Map;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Entity\Map\Field\EntityFieldMapInterface;
use Vain\Core\Entity\Map\Relation\EntityRelationMapInterface;

/**
 * Interface EntityMapInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityMapInterface extends ArrayInterface
{
    /**
     * @return string
     */
    public function getEntityName() : string;

    /**
     * @return array
     */
    public function getFields() : array;

    /**
     * @return EntityFieldMapInterface[]
     */
    public function getFieldMaps() : array;

    /**
     * @return array
     */
    public function getRelations() : array;

    /**
     * @return EntityRelationMapInterface[]
     */
    public function getRelationMaps() : array;
}
