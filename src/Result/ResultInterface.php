<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 5/26/16
 * Time: 11:28 AM
 */

namespace Vain\Core\Result;


interface ResultInterface
{
    /**
     * @return bool
     */
    public function getStatus();

    /**
     * @return ResultInterface
     */
    public function invert();
}