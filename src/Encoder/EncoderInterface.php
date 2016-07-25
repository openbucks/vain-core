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
namespace Vain\Core\Encoder;

/**
 * Interface EncoderInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface EncoderInterface
{
    /**
     * @param mixed $dataToEncode
     *
     * @return mixed
     */
    public function encode($dataToEncode);

}