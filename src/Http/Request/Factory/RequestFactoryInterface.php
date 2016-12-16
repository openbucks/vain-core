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

namespace Vain\Core\Http\Request\Factory;

use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Stream\VainStreamInterface;
use Vain\Core\Http\Uri\VainUriInterface;

/**
 * Interface RequestFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface RequestFactoryInterface
{
    const PARSE_URL_SCHEME = 'scheme';
    const PARSE_URL_HOST = 'host';
    const PARSE_URL_PORT = 'port';
    const PARSE_URL_USER = 'user';
    const PARSE_URL_PASS = 'pass';
    const PARSE_URL_PATH = 'path';
    const PARSE_URL_QUERY = 'query';
    const PARSE_URL_FRAGMENT = 'fragment';

    /**
     * @return VainServerRequestInterface
     */
    public function createFromGlobals();

    /**
     * @param array               $serverParams
     * @param array               $uploadedFiles
     * @param array               $queryParams
     * @param array               $attributes
     * @param array               $parsedBody
     * @param string              $protocol
     * @param string              $method
     * @param VainUriInterface    $uri
     * @param VainStreamInterface $stream
     * @param array               $cookies
     * @param array               $headers
     *
     * @return VainServerRequestInterface
     */
    public function createRequest(
        array $serverParams,
        array $uploadedFiles,
        array $queryParams,
        array $attributes,
        array $parsedBody,
        string $protocol,
        string $method,
        VainUriInterface $uri,
        VainStreamInterface $stream,
        array $cookies,
        array $headers
    ) : VainServerRequestInterface;
}