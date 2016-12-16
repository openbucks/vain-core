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

namespace Vain\Core\Connection;

use Vain\Core\Name\NameableInterface;

/**
 * Interface ConnectionInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ConnectionInterface extends NameableInterface
{
    /**
     * @return mixed
     */
    public function establish();
}