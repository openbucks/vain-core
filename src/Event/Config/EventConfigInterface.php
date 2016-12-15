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

namespace Vain\Core\Event\Config;

use Vain\Core\Config\ConfigInterface;

/**
 * Interface EventConfigInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventConfigInterface extends ConfigInterface
{
    /**
     * @return string
     */
    public function getAlias() : string;

    /**
     * @return bool
     */
    public function isBackground() : bool;

    /**
     * @return bool
     */
    public function isForeground() : bool;
}