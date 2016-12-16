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

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Http\Header\VainHeaderInterface;

/**
 * Class HeaderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HeaderException extends AbstractCoreException
{
    private $header;

    /**
     * HeaderException constructor.
     *
     * @param VainHeaderInterface $header
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        VainHeaderInterface $header,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->header = $header;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return VainHeaderInterface
     */
    public function getHeader() : VainHeaderInterface
    {
        return $this->header;
    }
}