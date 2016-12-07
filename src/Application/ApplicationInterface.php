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

namespace Vain\Core\Application;

use Vain\Core\Container\ContainerInterface;

/**
 * Interface ApplicationInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApplicationInterface
{
    /**
     * @return ContainerInterface
     */
    public function getContainer() : ContainerInterface;
}