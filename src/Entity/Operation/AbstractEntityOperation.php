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

namespace Vain\Core\Entity\Operation;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Operation\OperationInterface;

/**
 * Class AbstractEntityOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEntityOperation extends AbstractOperation implements OperationInterface
{
    private $entity;

    /**
     * AbstractEntityOperation constructor.
     *
     * @param EntityInterface $entity
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return EntityInterface
     */
    public function getEntity() : EntityInterface
    {
        return $this->entity;
    }
}
