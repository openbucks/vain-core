<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/4/16
 * Time: 11:53 AM
 */

namespace Vain\Core\Runtime\Exception;


class UnknownPropertyRuntimeDataException extends RuntimeDataException
{
    /**
     * VainRuntimeDataUnknownPropertyException constructor.
     * @param \ArrayAccess $runtimeData
     * @param string $property
     */
    public function __construct(\ArrayAccess $runtimeData, $property)
    {
        parent::__construct($runtimeData, sprintf('Runtime data container does not have property %s', $property), 0, null);
    }
}