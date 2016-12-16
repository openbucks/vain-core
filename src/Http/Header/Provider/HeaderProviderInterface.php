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

namespace Vain\Core\Http\Header\Provider;

/**
 * Interface HeaderProviderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HeaderProviderInterface
{
    /**
     * @param array $data
     *
     * @return array[]
     */
    public function getHeaders(array $data);
}