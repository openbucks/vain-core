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
declare(strict_types=1);

namespace Vain\Core\Exception;

use Vain\Core\Encoder\Json\JsonEncoder;

/**
 * Class JsonEncodeException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class JsonEncodeException extends EncoderException
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
        parent::__construct($encoder, sprintf('Json encode returned code %d: %S', $code, $message), 0, null);
    }
}