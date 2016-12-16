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

use Vain\Core\Config\Data\Reader\ReaderInterface;

/**
 * Class AbstractHandlerFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHandlerFactory implements HandlerFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createReader(string $filename) : ReaderInterface
    {
        return $this->createHandler($filename);
    }
}
