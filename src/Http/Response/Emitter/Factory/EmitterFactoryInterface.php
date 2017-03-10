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

namespace Vain\Core\Http\Response\Emitter\Factory;

use Vain\Core\Http\Response\Emitter\EmitterInterface;

/**
 * Interface EmitterInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EmitterFactoryInterface
{
    /**
     * @return EmitterInterface
     */
    public function createEmitter() : EmitterInterface;
}