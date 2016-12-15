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

namespace Vain\Core\Event;

use Vain\Core\Display\DisplayableInterface;
use Vain\Core\Name\NameableInterface;

/**
 * Interface EventInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EventInterface extends NameableInterface, DisplayableInterface
{
}