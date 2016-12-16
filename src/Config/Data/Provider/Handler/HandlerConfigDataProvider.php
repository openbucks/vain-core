<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Config\Data\Provider\Handler;

use Vain\Core\Config\Data\Handler\Factory\HandlerFactoryInterface;
use Vain\Core\Config\Data\Handler\HandlerInterface;
use Vain\Core\Config\Data\Provider\AbstractConfigDataProvider;
use Vain\Core\Config\Data\Provider\ConfigDataProviderInterface;

/**
 * Class HandlerConfigDataProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HandlerConfigDataProvider extends AbstractConfigDataProvider
{
    private $handlerFactory;

    private $caching;

    private $handlers;

    /**
     * HandlerConfigDataProvider constructor.
     *
     * @param ConfigDataProviderInterface $provider
     * @param HandlerFactoryInterface     $handlerFactory
     * @param bool                        $caching
     * @param HandlerInterface[]          $handlers
     */
    public function __construct(
        ConfigDataProviderInterface $provider,
        HandlerFactoryInterface $handlerFactory,
        bool $caching = false,
        array $handlers = []
    ) {
        $this->handlerFactory = $handlerFactory;
        $this->handlers = $handlers;
        $this->caching = $caching;
        parent::__construct($provider);
    }

    /**
     * @inheritdoc
     */
    public function getConfigData(string $fileName) : array
    {
        if (false === $this->caching) {
            return $this->getNext()->getConfigData($fileName);
        }

        if (false === array_key_exists($fileName, $this->handlers)) {
            $this->handlers[$fileName] = $this->handlerFactory->createHandler($fileName);
        }

        if (null !== ($configData = $this->handlers[$fileName]->read())) {
            return $configData;
        }

        $configData = $this->getNext()->getConfigData($fileName);
        $this->handlers[$fileName]->write($configData);

        return $configData;
    }
}
