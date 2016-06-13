<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:23 AM
 */

namespace Vain\Core\Result\Successful;

use Vain\Core\Result\AbstractResult;
use Vain\Core\Result\ResultInterface;

class FailedResult extends AbstractResult implements ResultInterface
{
    public function __construct()
    {
        parent::__construct(false);
    }
}