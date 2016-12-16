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

namespace Vain\Core\Http\Header\Provider\Apache;

use Vain\Core\Http\Header\Provider\AbstractHeaderProvider;

/**
 * Class ApacheHeaderProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApacheHeaderProvider extends AbstractHeaderProvider
{
    /**
     * @inheritDoc
     */
    public function getHeaders(array $data) : array
    {
        if (false === function_exists('getallheaders')) {
            return $this->getNext()->getHeaders($data);
        }

        return getallheaders();
    }
}