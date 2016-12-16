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

namespace Vain\Core\Http\Response\Decorator;

use Psr\Http\Message\ResponseInterface;
use Vain\Core\Http\Message\Decorator\AbstractMessageDecorator;

/**
 * Class AbstractResponseDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ResponseInterface getMessage
 */
abstract class AbstractResponseDecorator extends AbstractMessageDecorator implements ResponseInterface
{
    /**
     * AbstractResponseDecorator constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response);
    }

    /**
     * @inheritDoc
     */
    public function getStatusCode()
    {
        return $this->getMessage()->getStatusCode();
    }

    /**
     * @inheritDoc
     */
    public function withStatus($code, $reasonPhrase = '')
    {
        $copy = clone $this;
        $copy->message = $this->getMessage()->withStatus($code, $reasonPhrase);

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function getReasonPhrase()
    {
        return $this->getMessage()->getReasonPhrase();
    }
}