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

namespace Vain\Core\Result;

use Vain\Core\Equal\EquatableInterface;

/**
 * Class AbstractResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractResult implements ResultInterface
{
    private $status;

    /**
     * AbstractResult constructor.
     *
     * @param bool $status
     */
    public function __construct(bool $status)
    {
        $this->status = $status;
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful() : bool
    {
        return $this->getStatus();
    }

    /**
     * @inheritDoc
     */
    public function getStatus() : bool
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function invert() : AbstractResult
    {
        $clone = clone $this;
        $clone->status = !$this->status;

        return $clone;
    }

    /**
     * @inheritDoc
     */
    public function toDisplay() : array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function equals(EquatableInterface $equatable) : bool
    {
        /**
         * @var ResultInterface $equatable
         */
        return $this->status === $equatable->getStatus();
    }
}
