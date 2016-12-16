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

namespace Vain\Core\Operation\Failed;

use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\FailedResult;
use Vain\Core\Result\ResultInterface;

/**
 * Class FailedOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FailedOperation extends AbstractOperation
{

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        return new FailedResult();
    }
}
