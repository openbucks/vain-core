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

use Vain\Core\Http\Response\AbstractResponse;

/**
 * Class ResponseException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ResponseException extends MessageException
{
    /**
     * ResponseException constructor.
     *
     * @param AbstractResponse $abstractResponse
     * @param string           $message
     * @param int              $code
     * @param \Exception|null  $previous
     */
    public function __construct(
        AbstractResponse $abstractResponse,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        parent::__construct($abstractResponse, $message, $code, $previous);
    }
}