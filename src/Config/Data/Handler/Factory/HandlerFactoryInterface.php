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

namespace Vain\Core\Config\Data\Handler\Factory;

use Vain\Core\Config\Data\Handler\HandlerInterface;
use Vain\Core\Config\Data\Reader\Factory\ReaderFactoryInterface;

/**
 * Interface HandlerFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HandlerFactoryInterface extends ReaderFactoryInterface
{
    /**
     * @param string $fileName
     *
     * @return HandlerInterface
     */
    public function createHandler(string $fileName) : HandlerInterface;
}
