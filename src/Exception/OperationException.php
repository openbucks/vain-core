<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-operation
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Operation\OperationInterface;

/**
 * Class OperationException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationException extends AbstractCoreException
{
    private $operation;

    /**
     * VainOperationException constructor.
     *
     * @param OperationInterface $operation
     * @param string             $message
     * @param int                $code
     * @param \Exception|null    $previous
     */
    public function __construct(
        OperationInterface $operation,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->operation = $operation;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return OperationInterface
     */
    public function getOperation() : OperationInterface
    {
        return $this->operation;
    }
}
