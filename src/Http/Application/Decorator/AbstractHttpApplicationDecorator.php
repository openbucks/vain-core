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

namespace Vain\Core\Http\Application\Decorator;

use Psr\Container\ContainerInterface;
use Vain\Core\Http\Application\HttpApplicationInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class AbstractHttpApplicationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHttpApplicationDecorator implements HttpApplicationInterface
{

    private $application;

    /**
     * AbstractHttpApplicationDecorator constructor.
     *
     * @param HttpApplicationInterface $application
     */
    public function __construct(HttpApplicationInterface $application)
    {
        $this->application = $application;
    }

    /**
     * @inheritDoc
     */
    public function handleRequest(VainServerRequestInterface $request): VainResponseInterface
    {
        return $this->application->handleRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function getContainer(): ContainerInterface
    {
        return $this->application->getContainer();
    }
}