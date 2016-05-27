<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/27/16
 * Time: 10:15 AM
 */

namespace Vain\Core\Result\Composite;

use Vain\Core\Result\ResultInterface;

class ResultComposite implements ResultCompositeInterface
{
    private $results = [];

    /**
     * ResultStorage constructor.
     * @param ResultInterface[] $results
     */
    public function __construct(array $results = [])
    {
        foreach ($results as $name => $result) {
            $this->addResult($name, $result);
        }
    }

    /**
     * @inheritDoc
     */
    public function addResult($name, ResultInterface $result)
    {
        $this->results[$name] = $result;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getResult($name)
    {
        if (false === array_key_exists($name, $this->results)) {
            return null;
        }

        return $this->results[$name];
    }

    /**
     * @inheritDoc
     */
    public function removeResult($name)
    {
        if (false === $this->hasResult($name)) {
            return $this;
        }

        unset($this->results[$name]);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getStatus()
    {
        foreach ($this->getResults() as $result) {
            if (false === $result->getStatus()) {
                return false;
            }
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function invert()
    {
        $clone = clone $this;
        foreach ($clone->getResults() as $name => $result) {
            $clone->results[$name] = $result->invert();
        }

        return $this;
    }


    /**
     * @inheritDoc
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @inheritDoc
     */
    public function hasResult($name)
    {
        return array_key_exists($name, $this->results);
    }

    /**
     * @inheritDoc
     */
    public function __clone()
    {
        foreach ($this->getResults() as $name => $result) {
            $this->results[$name] = clone $result;
        }
    }
}