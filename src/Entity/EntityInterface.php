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

namespace Vain\Core\Entity;

use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Display\DisplayableInterface;
use Vain\Core\Equal\EquatableInterface;
use Vain\Core\PrivateX\PrivateInterface;

/**
 * Class EntityInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EntityInterface extends DisplayableInterface, PrivateInterface, EquatableInterface, ArrayInterface
{
    /**
     * @return int
     */
    public function getPrimaryKey();

    /**
     * @return string
     */
    public function getEntityName() : string;

    /**
     * @return array
     */
    public function toRecord() : array;
}
