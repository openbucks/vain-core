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

namespace Vain\Core\Http\Event\Handler;

use Vain\Core\Event\Handler\AbstractEventHandler;
use Vain\Core\Event\Resolver\EventResolverInterface;
use Vain\Core\Http\Event\RequestEventInterface;
use Vain\Core\Http\Event\ResponseEventInterface;
use Vain\Logger\LoggerInterface;

/**
 * Class HttpEventHandler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HttpEventHandler extends AbstractEventHandler implements
    RequestEventHandlerInterface,
    ResponseEventHandlerInterface
{
    private $logger;

    private $logHeader;

    /**
     * DynamicLogger constructor.
     *
     * @param EventResolverInterface $resolver
     * @param LoggerInterface   $logger
     * @param string            $logHeader
     */
    public function __construct(EventResolverInterface $resolver, LoggerInterface $logger, string $logHeader)
    {
        $this->logger = $logger;
        $this->logHeader = $logHeader;
        parent::__construct($resolver);
    }

    /**
     * @inheritDoc
     */
    public function request(RequestEventInterface $event) : RequestEventHandlerInterface
    {
        $request = $event->getRequest();
        if (false === $request->hasHeader($this->logHeader)) {
            return $this;
        }
        $this->logger->overrideLevel($request->getHeader($this->logHeader));

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function response(ResponseEventInterface $event) : ResponseEventHandlerInterface
    {
        $this->logger->restoreLevel();

        return $this;
    }
}