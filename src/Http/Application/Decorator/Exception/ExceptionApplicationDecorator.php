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
declare(strict_types=1);

namespace Vain\Core\Http\Application\Decorator\Exception;

use Vain\Core\Http\Application\Decorator\AbstractHttpApplicationDecorator;
use Vain\Core\Http\Application\HttpApplicationInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\Factory\ResponseFactoryInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class ExceptionApplicationDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ExceptionApplicationDecorator extends AbstractHttpApplicationDecorator
{
    private $responseFactory;

    /**
     * ExceptionApplicationDecorator constructor.
     *
     * @param HttpApplicationInterface $application
     * @param ResponseFactoryInterface $responseFactory
     */
    public function __construct(HttpApplicationInterface $application, ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
        parent::__construct($application);
    }

    /**
     * @inheritDoc
     */
    public function handleRequest(VainServerRequestInterface $request): VainResponseInterface
    {
        try {
            $response = parent::handleRequest($request);
        } catch (\Throwable $e) {
            $response = $this->responseFactory
                ->createResponse(
                    'php://temp',
                    $e->getCode(),
                    [],
                    json_encode(
                        ['status' => false, 'code' => $e->getCode(), 'message' => $e->getMessage()]
                    )
                )
                ->withStatus($e->getCode(), $e->getMessage());
            if ($request->hasHeader('Content-Type')) {
                $response->withHeader('Content-Type', $request->getHeader('Content-Type'));
            }
        }

        return $response;
    }
}