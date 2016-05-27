<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/27/16
 * Time: 10:13 AM
 */

namespace Vain\Core\Result\Storage;

use Vain\Core\Result\ResultInterface;

interface ResultStorageInterface
{
    /**
     * @param string $name
     * @param ResultInterface $result
     *
     * @return ResultStorageInterface
     */
    public function addResult($name, ResultInterface $result);

    /**
     * @param string $name
     *
     * @return ResultInterface
     */
    public function getResult($name);

    /**
     * @param string $name
     *
     * @return ResultStorageInterface
     */
    public function removeResult($name);

    /**
     * @return ResultInterface[]
     */
    public function getResults();

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function hasResult($name);
}