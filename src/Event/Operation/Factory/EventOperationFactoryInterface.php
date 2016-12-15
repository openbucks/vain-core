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

namespace Vain\Core\Event\Operation\Factory;

use Vain\Core\Event\EventInterface;
use Vain\Core\Operation\OperationInterface;

/**
 * Interface EventOperationFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventOperationFactoryInterface
{
    /**
     * @param EventInterface $event
     *
     * @return OperationInterface
     */
    public function createOperation(EventInterface $event) : OperationInterface;
}