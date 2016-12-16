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

namespace Vain\Core\Http\Header\Provider\Server;

use Vain\Core\Http\Header\Provider\HeaderProviderInterface;

/**
 * Class ServerHeaderProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ServerHeaderProvider implements HeaderProviderInterface
{
    /**
     * @inheritDoc
     */
    public function getHeaders(array $data) : array
    {
        $headers = [];
        foreach ($data as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }

        return $headers;
    }
}