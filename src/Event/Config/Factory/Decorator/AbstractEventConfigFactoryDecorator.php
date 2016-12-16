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
declare(strict_types = 1);

namespace Vain\Core\Event\Config\Factory\Decorator;

use Vain\Core\Event\Config\EventConfigInterface;
use Vain\Core\Event\Config\Factory\EventConfigFactoryInterface;

/**
 * Class AbstractEventConfigFactoryDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractEventConfigFactoryDecorator implements EventConfigFactoryInterface
{
    private $eventConfigFactory;

    /**
     * AbstractEventConfigFactoryDecorator constructor.
     *
     * @param EventConfigFactoryInterface $eventConfigFactory
     */
    public function __construct(EventConfigFactoryInterface $eventConfigFactory)
    {
        $this->eventConfigFactory = $eventConfigFactory;
    }

    /**
     * @inheritDoc
     */
    public function createConfig(string $name, array $configData) : EventConfigInterface
    {
        return $this->eventConfigFactory->createConfig($name, $configData);
    }
}
