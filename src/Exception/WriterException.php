<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Config\Data\Writer\WriterInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class WriterException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class WriterException extends AbstractCoreException
{
    private $writer;

    /**
     * WriterException constructor.
     *
     * @param WriterInterface $writer
     * @param string          $message
     * @param int             $code
     * @param \Exception      $previous
     */
    public function __construct(WriterInterface $writer, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->writer = $writer;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return WriterInterface
     */
    public function getWriter() : WriterInterface
    {
        return $this->writer;
    }
}
