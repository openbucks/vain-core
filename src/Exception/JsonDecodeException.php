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
namespace Vain\Core\Exception;

use Vain\Core\Encoder\Json\JsonEncoder;

/**
 * Class JsonDecodeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class JsonDecodeException extends DecoderException
{
    /**
     * JsonEncodeException constructor.
     *
     * @param JsonEncoder $encoder
     * @param int         $code
     * @param string      $message
     */
    public function __construct(JsonEncoder $encoder, $code, $message)
    {
        parent::__construct($encoder, sprintf('Json decode returned code %d: %S', $code, $message), 0, null);
    }
}