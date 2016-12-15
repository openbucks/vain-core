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

/**
 * Class AbstractEventConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEventConfig implements EventConfigInterface
{
    /**
     * @inheritDoc
     */
    public function isForeground() : bool
    {
        return (false === $this->isBackground());
    }
}