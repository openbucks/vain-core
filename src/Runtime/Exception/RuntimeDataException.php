<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:51 AM
 */

namespace Vain\Core\Runtime\Exception;

use Vain\Core\Exception\CoreException;

class RuntimeDataException extends CoreException
{
    private $runtimeData;

    /**
     * VainRuntimeDataException constructor.
     * @param \ArrayAccess $runtimeData
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(\ArrayAccess $runtimeData, $message, $code, \Exception $previous = null)
    {
        $this->runtimeData = $runtimeData;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return \ArrayAccess
     */
    public function getRuntimeData()
    {
        return $this->runtimeData;
    }
}