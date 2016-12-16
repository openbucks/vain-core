<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-event
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-event
 */

namespace Vain\Core\Event\Config;

use Vain\Core\Event\Config\AbstractEventConfig;

/**
 * Class EventConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventConfig extends AbstractEventConfig
{
    const FIELD_ALIAS = 'alias';
    const FIELD_BACKGROUND = 'background';

    private $configData;

    /**
     * EventConfig constructor.
     *
     * @param array $configData
     */
    public function __construct(array $configData)
    {
        $this->configData = $configData;
    }

    /**
     * @inheritDoc
     */
    public function getAlias() : string
    {
        return $this->configData[self::FIELD_ALIAS];
    }

    /**
     * @inheritDoc
     */
    public function isBackground() : bool
    {
        return $this->configData[self::FIELD_BACKGROUND];
    }
}
