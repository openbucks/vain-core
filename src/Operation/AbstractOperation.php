<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-operation
 */
declare(strict_types = 1);

namespace Vain\Core\Operation;

/**
 * Class AbstractOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractOperation implements OperationInterface
{
    /**
     * @return string
     */
    public function getName() : string
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
