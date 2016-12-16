<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Config\Data\Handler;

use Vain\Core\Config\Data\Reader\ReaderInterface;
use Vain\Core\Config\Data\Writer\WriterInterface;

/**
 * Interface HandlerInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HandlerInterface extends ReaderInterface, WriterInterface
{
}
