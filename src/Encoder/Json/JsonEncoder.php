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

namespace Vain\Core\Encoder\Json;

use Vain\Core\Decoder\DecoderInterface;
use Vain\Core\Encoder\EncoderInterface;
use Vain\Core\Exception\JsonDecodeException;
use Vain\Core\Exception\JsonEncodeException;

/**
 * Class JsonEncoder
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class JsonEncoder implements EncoderInterface, DecoderInterface
{
    /**
     * @inheritDoc
     */
    public function encode($dataToEncode) : string
    {
        $encoded = json_encode($dataToEncode);
        if (0 !== ($errorCode = json_last_error())) {
            $errorMessage = json_last_error_msg();
            json_encode(null);
            throw new JsonEncodeException($this, $errorCode, $errorMessage);
        }

        return $encoded;
    }

    /**
     * @inheritDoc
     */
    public function decode(string $dataToDecode)
    {
        $decoded = json_decode($dataToDecode, true);
        if (0 !== ($errorCode = json_last_error())) {
            $errorMessage = json_last_error_msg();
            json_encode(null);
            throw new JsonDecodeException($this, $errorCode, $errorMessage);
        }

        return $decoded;
    }
}