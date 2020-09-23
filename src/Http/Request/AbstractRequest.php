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

namespace Vain\Core\Http\Request;

use Psr\Http\Message\UriInterface;
use Vain\Core\Http\Header\Storage\HeaderStorageInterface;
use Vain\Core\Http\Message\AbstractMessage;
use Vain\Core\Http\Stream\VainStreamInterface;
use Vain\Core\Http\Uri\VainUriInterface;

/**
 * Class AbstractRequest
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractRequest extends AbstractMessage implements VainRequestInterface
{
    private $method;

    private $uri;

    /**
     * AbstractRequest constructor.
     *
     * @param string                 $method
     * @param VainUriInterface       $uri
     * @param VainStreamInterface    $stream
     * @param HeaderStorageInterface $headerStorage
     */
    public function __construct(
        string $method,
        VainUriInterface $uri,
        VainStreamInterface $stream,
        HeaderStorageInterface $headerStorage
    ) {
        $this->method = $method;
        $this->uri = $uri;
        parent::__construct($stream, $headerStorage);
    }

    /**
     * @inheritDoc
     */
    public function getRequestTarget() : string
    {
        return $this->uri->getPath();
    }

    /**
     * @inheritDoc
     */
    public function withRequestTarget($requestTarget) : VainRequestInterface
    {
        $copy = clone $this;
        $copy->uri = $this->uri->withPath($requestTarget);

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function withMethod($method) : VainRequestInterface
    {
        $copy = clone $this;
        $copy->method = $method;

        return $copy;
    }

    /**
     * @return string
     */
    public function getUri(bool $onlyPath = NULL): string
    {
        return $onlyPath ? $this->uri->getPath() : (string) $this->uri;
    }

    /**
     * @return VainUriInterface
     */
    public function getVUri() : VainUriInterface
    {
        return $this->uri;
    }

    /**
     * @inheritDoc
     */
    public function withUri(UriInterface $uri, $preserveHost = false) : VainRequestInterface
    {
        $copy = clone $this;
        $copy->uri = $uri;
        if ($preserveHost && $this->hasHeader('Host')) {
            return $copy;
        }

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function getContents() : string
    {
        $this->getBody()->rewind();

        return $this->getBody()->getContents();
    }

    /**
     * @inheritDoc
     */
    public function getHeader($name) : string
    {
        if (false === $this->getHeaderStorage()->hasHeader($name)) {
            return [];
        }

        return (string) $this->getHeaderStorage()->getHeader($name);
    }

    /**
     * @inheritDoc
     */
    public function getHeaders() : array
    {
        $result = [];
        foreach ($this->getHeaderStorage()->getHeaders() as $header) {
            $result[$header->getName()] = $header->getValues();
        }

        return $result;
    }

    /**
     * @inheritDoc
     */
    protected function __clone()
    {
        $this->uri = clone $this->uri;

        return parent::__clone();
    }
}