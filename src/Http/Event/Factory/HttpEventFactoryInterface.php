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

namespace Vain\Core\Http\Event\Factory;

use Vain\Core\Http\Event\RequestEventInterface;
use Vain\Core\Http\Event\ResponseEventInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Class HttpEventFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HttpEventFactoryInterface
{
    /**
     * @param VainServerRequestInterface $request
     *
     * @return RequestEventInterface
     */
    public function createRequestEvent(VainServerRequestInterface $request);

    /**
     * @param VainResponseInterface $response
     *
     * @return ResponseEventInterface
     */
    public function createResponseEvent(VainResponseInterface $response);
}