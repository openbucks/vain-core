<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-http
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-http
 */
declare(strict_types = 1);

namespace Vain\Core\Http\Application\Decorator\Event;

use Vain\Core\Event\Dispatcher\EventDispatcherInterface;
use Vain\Core\Http\Application\Decorator\AbstractHttpApplicationDecorator;
use Vain\Core\Http\Application\HttpApplicationInterface;
use Vain\Core\Http\Event\Factory\HttpEventFactoryInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class EventApplicationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EventApplicationDecorator extends AbstractHttpApplicationDecorator
{
    private $eventDispatcher;

    private $eventFactory;

    /**
     * EventApplicationDecorator constructor.
     *
     * @param HttpApplicationInterface $application
     * @param EventDispatcherInterface $eventDispatcher
     * @param  HttpEventFactoryInterface $eventFactory
     */
    public function __construct(
        HttpApplicationInterface $application,
        EventDispatcherInterface $eventDispatcher,
        HttpEventFactoryInterface $eventFactory
    ) {
        $this->eventDispatcher = $eventDispatcher;
        $this->eventFactory = $eventFactory;
        parent::__construct($application);
    }

    /**
     * @inheritDoc
     */
    public function handleRequest(VainServerRequestInterface $request): VainResponseInterface
    {
        $this->eventDispatcher->dispatch($this->eventFactory->createRequestEvent($request));
        $response = parent::handleRequest($request);
        $this->eventDispatcher->dispatch($this->eventFactory->createResponseEvent($response));

        return $response;
    }
}