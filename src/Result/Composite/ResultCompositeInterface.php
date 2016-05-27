<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/27/16
 * Time: 10:13 AM
 */

namespace Vain\Core\Result\Composite;

use Vain\Core\Result\ResultInterface;

/**
 * @method ResultCompositeInterface invert
 */
interface ResultCompositeInterface extends ResultInterface
{
    /**
     * @param string $name
     * @param ResultInterface $result
     *
     * @return ResultCompositeInterface
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
     * @return ResultCompositeInterface
     */
    public function removeResult($name);

    /**
     * @return ResultInterface[]
     */
    public function getResults();

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasResult($name);
}