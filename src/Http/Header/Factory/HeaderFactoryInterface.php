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

namespace Vain\Core\Http\Header\Factory;

use Vain\Core\Http\Header\VainHeaderInterface;

/**
 * Interface HeaderFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HeaderFactoryInterface
{
    /**
     * @param string $name
     * @param mixed  $values
     *
     * @return VainHeaderInterface
     */
    public function createHeader(string $name, $values) : VainHeaderInterface;
}