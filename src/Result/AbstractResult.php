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
    public function serialize()
    {
        return json_encode(['status' => $this->status]);
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized)
    {
        $serializedData = json_decode($serialized);
        $this->status = $serializedData->status;

        return $this;
    }
}