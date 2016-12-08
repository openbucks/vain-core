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

namespace Vain\Core\Application\Context;

use Vain\Core\ArrayX\ArrayInterface;

/**
 * Interface ContextInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationContextInterface extends ArrayInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return string
     */
    public function getVersion() : string;

    /**
     * @return string
     */
    public function getEnv() : string;

    /**
     * @return string
     */
    public function getMode() : string;
}
