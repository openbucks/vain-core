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
namespace Vain\Core\Result;

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
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful()
    {
        return $this->getStatus();
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function invert()
    {
        $clone = clone $this;
        $clone->status = !$this->status;

        return $clone;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->isSuccessful() ? 'true' : 'false';
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return ['status' => $this->status];
    }
}