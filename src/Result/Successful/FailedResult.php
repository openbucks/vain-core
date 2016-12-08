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
declare(strict_types = 1);

namespace Vain\Core\Result\Successful;

use Vain\Core\Result\AbstractResult;
use Vain\Core\Result\ResultInterface;

/**
 * Class FailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FailedResult extends AbstractResult implements ResultInterface
{
    /**
     * FailedResult constructor.
     */
    public function __construct()
    {
        parent::__construct(false);
    }
}
