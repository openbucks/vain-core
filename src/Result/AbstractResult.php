<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/26/16
 * Time: 11:29 AM
 */

namespace Vain\Core\Result;

abstract class AbstractResult implements ResultInterface
{
    private $status;

    /**
     * AbstractResult constructor.
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