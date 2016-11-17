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

namespace Vain\Core\Container;

/**
 * Interface ContainerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ContainerInterface extends \ArrayAccess
{
    /**
     * @param string $serviceId
     *
     * @return mixed
     */
    public function get($serviceId);

    /**
     * @param string $serviceId
     *
     * @return mixed
     */
    public function has($serviceId);

    /**
     * @param string $parameter
     *
     * @return mixed
     */
    public function getParameter($parameter);

    /**
     * @param string $parameter
     *
     * @return bool
     */
    public function hasParameter($parameter);
}