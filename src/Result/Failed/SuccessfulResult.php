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

namespace Vain\Core\Result\Failed;

use Vain\Core\Result\AbstractResult;
use Vain\Core\Result\ResultInterface;

/**
 * Class SuccessfulResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
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