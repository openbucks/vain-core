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

namespace Vain\Core\Encoder\Xml;

use Vain\Core\Encoder\DecoderInterface;
use Vain\Core\Encoder\EncoderInterface;

/**
 * Class XmlEncoder
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class XmlEncoder implements EncoderInterface, DecoderInterface
{
    /**
     * @inheritDoc
     */
    public function decode(string $dataToDecode)
    {
        return '';
    }

    /**
     * @inheritDoc
     */
    public function encode($dataToEncode) : string
    {
        return '';
    }
}
