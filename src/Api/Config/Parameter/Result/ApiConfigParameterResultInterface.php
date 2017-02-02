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

use Vain\Core\Result\ResultInterface;

/**
 * Interface ApiConfigParameterResultInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiConfigParameterResultInterface extends ResultInterface
{
    /**
     * @return mixed
     */
    public function getValue();
}