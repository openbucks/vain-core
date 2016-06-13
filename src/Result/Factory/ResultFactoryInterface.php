<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:55 AM
 */

namespace Vain\Core\Result\Factory;

use Vain\Core\Result\ResultInterface;

interface ResultFactoryInterface
{
    /**
     * @return ResultInterface
     */
    public function successful();

    /**
     * @return ResultInterface
     */
    public function failed();

    /**
     * @param string $status
     *
     * @return ResultInterface
     */
    public function createResult($status);
}