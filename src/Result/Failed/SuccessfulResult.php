<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 6/13/16
 * Time: 11:23 AM
 */

namespace Vain\Core\Result\Failed;

use Vain\Core\Result\AbstractResult;
use Vain\Core\Result\ResultInterface;

class SuccessfulResult extends AbstractResult implements ResultInterface
{
    /**
     * SuccessfulResult constructor.
     */
    public function __construct()
    {
        parent::__construct(true);
    }
}