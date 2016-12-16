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

namespace Vain\Core\Logger\Factory;

use Psr\Log\LoggerInterface;

/**
 * Class LoggerFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LoggerFactoryInterface
{
    /**
     * @param string $channel
     *
     * @return LoggerInterface
     */
    public function createLogger(string $channel) : LoggerInterface;
}