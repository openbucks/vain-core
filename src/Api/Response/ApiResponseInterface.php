<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Response;

use Vain\Core\Equal\EquatableInterface;

/**
 * Interface ApiResponseInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiResponseInterface extends EquatableInterface
{
    /**
     * @return int
     */
    public function getStatus() : int;

    /**
     * @return string
     */
    public function getShortMessage() : string;

    /**
     * @return array
     */
    public function getHeaders() : array;

    /**
     * @param int $status
     *
     * @return ApiResponseInterface
     */
    public function withStatus(int $status) : ApiResponseInterface;

    /**
     * @param string $header
     * @param string $value
     *
     * @return ApiResponseInterface
     */
    public function withHeader(string $header, string $value) : ApiResponseInterface;

    /**
     * @param string $key
     * @param mixed  $line
     *
     * @return ApiResponseInterface
     */
    public function withDataLine(string $key, string $line) : ApiResponseInterface;

    /**
     * @param array $data
     *
     * @return ApiResponseInterface
     */
    public function withData(array $data) : ApiResponseInterface;

    /**
     * @return array
     */
    public function getData() : array;
}