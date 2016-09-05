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
declare(strict_types=1);

namespace Vain\Core\Runtime\Exception;

use Vain\Core\Exception\AbstractCoreException;

/**
 * Class RuntimeDataException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RuntimeDataException extends AbstractCoreException
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
    public function getRuntimeData() : \ArrayAccess
    {
        return $this->runtimeData;
    }
}