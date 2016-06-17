<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
namespace Vain\Core\Runtime\Exception;

/**
 * Class UnknownPropertyRuntimeDataException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownPropertyRuntimeDataException extends RuntimeDataException
{
    /**
     * VainRuntimeDataUnknownPropertyException constructor.
     *
     * @param \ArrayAccess $runtimeData
     * @param string       $property
     */
    public function __construct(\ArrayAccess $runtimeData, $property)
    {
        parent::__construct(
            $runtimeData,
            sprintf('Runtime data container does not have property %s', $property),
            0,
            null
        );
    }
}