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

use Vain\Core\Display\DisplayableInterface;
use Vain\Core\PrivateX\PrivateInterface;

/**
 * Interface ContextInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationContextInterface extends DisplayableInterface, PrivateInterface
{
    /**
     * @return string
     */
    public function getHostName() : string;

    /**
     * @return int
     */
    public function getPid() : int;

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
