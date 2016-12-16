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

namespace Vain\Core\Config\Data\Reader\Factory;

use Vain\Core\Config\Data\Reader\ReaderInterface;

/**
 * Interface ReaderFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ReaderFactoryInterface
{
    /**
     * @param string $filename
     *
     * @return ReaderInterface
     */
    public function createReader(string $filename) : ReaderInterface;
}
