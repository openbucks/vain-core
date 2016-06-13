<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:55 AM
 */

namespace Vain\Core\Result\Factory;

use Vain\Core\Result\Failed\SuccessfulResult;
use Vain\Core\Result\Successful\FailedResult;

class ResultFactory implements ResultFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function successful()
    {
        return new SuccessfulResult();
    }

    /**
     * @inheritDoc
     */
    public function failed()
    {
        return new FailedResult();
    }

    /**
     * @inheritDoc
     */
    public function createResult($status)
    {
        if (false === $status) {
            return $this->failed();
        }

        return $this->successful();
    }
}