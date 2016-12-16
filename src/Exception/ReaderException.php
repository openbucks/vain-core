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

use Vain\Core\Config\Data\Reader\ReaderInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ReaderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ReaderException extends AbstractCoreException
{
    private $reader;

    /**
     * ReaderException constructor.
     *
     * @param ReaderInterface $reader
     * @param string          $message
     * @param int             $code
     * @param \Exception      $previous
     */
    public function __construct(ReaderInterface $reader, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->reader = $reader;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ReaderInterface
     */
    public function getReader() : ReaderInterface
    {
        return $this->reader;
    }
}
