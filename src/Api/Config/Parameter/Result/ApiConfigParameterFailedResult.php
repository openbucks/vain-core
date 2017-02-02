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

namespace Vain\Core\Api\Config\Parameter\Result;

use Vain\Core\Result\FailedResult;

/**
 * Class ApiConfigParameterFailedResult
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigParameterFailedResult extends FailedResult implements ApiConfigParameterResultInterface
{
    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return null;
    }
}