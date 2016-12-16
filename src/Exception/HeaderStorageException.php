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
use Vain\Core\Http\Header\Storage\HeaderStorageInterface;

/**
 * Class HeaderStorageException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class HeaderStorageException extends AbstractCoreException
{
    private $headerStorage;

    /**
     * HeaderStorageException constructor.
     *
     * @param HeaderStorageInterface $headerStorage
     * @param string                 $message
     * @param int                    $code
     * @param \Exception|null        $previous
     */
    public function __construct(
        HeaderStorageInterface $headerStorage,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->headerStorage = $headerStorage;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return HeaderStorageInterface
     */
    public function getHeaderStorage() : HeaderStorageInterface
    {
        return $this->headerStorage;
    }
}