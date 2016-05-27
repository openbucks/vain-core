<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/27/16
 * Time: 10:15 AM
 */

namespace Vain\Core\Result\Storage;

use Vain\Core\Result\ResultInterface;

class ResultStorage implements ResultStorageInterface
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
}