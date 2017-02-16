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

namespace Vain\Core\Entity\Result;

use Vain\Core\Entity\EntityInterface;
use Vain\Core\Result\AbstractFailedResult;

/**
 * Class AbstractEntityFailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEntityFailedResult extends AbstractFailedResult
{
    private $entity;

    /**
     * AbstractEntityFailedResult constructor.
     *
     * @param EntityInterface $entity
     */
    public function __construct(EntityInterface $entity)
    {
        $this->entity = $entity;
        parent::__construct();
    }

    /**
     * @return EntityInterface
     */
    public function getEntity() : EntityInterface
    {
        return $this->entity;
    }

    /**
     * @return array
     */
    public function toDisplay(): array
    {
        return array_merge(parent::toDisplay(), ['entity' => $this->entity->toDisplay()]);
    }
}