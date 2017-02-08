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
use Vain\Core\Http\Response\Emitter\Sapi\SapiEmitter;

/**
 * Class EmitterSapiFactory
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class EmitterSapiFactory implements EmitterFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createEmitter(): EmitterInterface
    {
        return new SapiEmitter();
    }
}