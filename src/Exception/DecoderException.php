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

use Vain\Core\Decoder\DecoderInterface;

/**
 * Class DecoderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DecoderException extends AbstractCoreException
{
    private $decoder;

    /**
     * DecoderException constructor.
     *
     * @param DecoderInterface $decoder
     * @param string           $message
     * @param int              $code
     * @param \Exception|null  $previous
     */
    public function __construct(DecoderInterface $decoder, $message, $code, \Exception $previous = null)
    {
        $this->decoder = $decoder;
        parent::__construct($message, $code, $previous);
    }
}