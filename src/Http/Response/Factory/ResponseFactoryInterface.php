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

namespace Vain\Core\Http\Response\Factory;

use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Interface ResponseFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ResponseFactoryInterface
{
    /**
     * @param string $destinationStream
     * @param int    $statusCode
     * @param array  $headersData
     * @param string $content
     *
     * @return VainResponseInterface
     */
    public function createResponse(
        string $destinationStream,
        int $statusCode = 200,
        array $headersData = [],
        string $content = ''
    ) : VainResponseInterface;
}