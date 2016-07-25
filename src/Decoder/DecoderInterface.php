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
namespace Vain\Core\Decoder;

/**
 * Interface DecoderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface DecoderInterface
{

    /**
     * @param mixed $dataToDecode
     *
     * @return mixed
     */
    public function decode($dataToDecode);
}