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

namespace Vain\Core\Http\Application\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Http\Application\Decorator\AbstractHttpApplicationDecorator;
use Vain\Core\Http\Application\HttpApplicationInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class LoggerApplicationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LoggerApplicationDecorator extends AbstractHttpApplicationDecorator
{
    private $logger;

    /**
     * LoggerApplicationDecorator constructor.
     *
     * @param HttpApplicationInterface $application
     * @param LoggerInterface          $logger
     */
    public function __construct(HttpApplicationInterface $application, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($application);
    }

    /**
     * @inheritDoc
     */
    public function handleRequest(VainServerRequestInterface $request): VainResponseInterface
    {
        $this->logger->debug(sprintf('Received request %s', implode(PHP_EOL, $request->toDisplay())));
        $response = parent::handleRequest($request);
        if ($response->getStatusCode() >= 400) {
            $this->logger->warning(sprintf('Generated error response %s', implode(PHP_EOL, $response->toDisplay())));
        } else {
            $this->logger->debug(sprintf('Generated successful response %s', implode(PHP_EOL, $response->toDisplay())));
        }

        return $response;
    }
}