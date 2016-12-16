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

namespace Vain\Core\Operation\Successful;

use Vain\Core\Operation\AbstractOperation;
use Vain\Core\Result\ResultInterface;
use Vain\Core\Result\SuccessfulResult;

/**
 * Class SuccessfulOperation
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SuccessfulOperation extends AbstractOperation
{
    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        return new SuccessfulResult();
    }
}
