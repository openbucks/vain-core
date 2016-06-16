<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-expression
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-expression
 */
namespace Vain\Core\Runtime\Exception;

use Vain\Core\Exception\CoreException;

/**
 * Class RuntimeDataException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RuntimeDataException extends CoreException
{
    private $runtimeData;

    /**
     * VainRuntimeDataException constructor.
     *
     * @param \ArrayAccess $runtimeData
     * @param string       $message
     * @param int          $code
     * @param \Exception   $previous
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