<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Response;

use Vain\Core\Api\Response\ApiResponseInterface;
use Vain\Core\Equal\EquatableInterface;

/**
 * Class ApiResponse
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiResponse implements ApiResponseInterface
{
    private $status;

    private $shortMessage;

    private $headers;

    private $data;

    /**
     * ApiResponse constructor.
     *
     * @param int    $status
     * @param string $shortMessage
     * @param array  $data
     * @param array  $headers
     */
    public function __construct($status = 200, string $shortMessage = '', array $data = [], array $headers = [])
    {
        $this->status = $status;
        $this->shortMessage = $shortMessage;
        $this->headers = $headers;
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function getShortMessage() : string
    {
        return $this->shortMessage;
    }

    /**
     * @inheritDoc
     */
    public function getHeaders() : array
    {
        return $this->headers;
    }

    /**
     * @inheritDoc
     */
    public function withStatus(int $status) : ApiResponseInterface
    {
        $copy = clone $this;
        $copy->status = $status;

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function withHeader(string $header, string $value) : ApiResponseInterface
    {
        $copy = clone $this;
        $copy->headers[$header] = $value;

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function withDataLine(string $key, string $line) : ApiResponseInterface
    {
        $copy = clone $this;
        $copy->data[$key] = $line;

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function withData(array $data) : ApiResponseInterface
    {
        $copy = clone $this;
        $copy->data = $data;

        return $copy;
    }

    /**
     * @inheritDoc
     */
    public function getData() : array
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function equals(EquatableInterface $equatable) : bool
    {
        /**
         * @var ApiResponseInterface $equatable
         */
        return ($this->status === $equatable->getStatus())
               && ($this->data === $equatable->getData())
               && ($this->headers === $equatable->getHeaders());
    }
}
