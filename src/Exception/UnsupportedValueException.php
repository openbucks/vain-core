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

namespace Vain\Core\Exception;

use Vain\Core\Http\Message\VainMessageInterface;

/**
 * Class UnsupportedValueException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedValueException extends MessageException
{
    /**
     * UnsupportedValueException constructor.
     *
     * @param VainMessageInterface $httpMessage
     * @param string               $value
     */
    public function __construct(VainMessageInterface $httpMessage, $value)
    {
        parent::__construct(
            $httpMessage,
            sprintf('Values should be either string or array, %s given', gettype($value))
        );
    }
}