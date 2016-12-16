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

namespace Vain\Core\Entity\Map\Field;

use Vain\Core\ArrayX\ArrayInterface;

/**
 * Interface EntityFieldMapInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityFieldMapInterface extends ArrayInterface
{
    /**
     * @return string
     */
    public function getFieldName() : string;

    /**
     * @return string
     */
    public function getColumnName() : string;
}
