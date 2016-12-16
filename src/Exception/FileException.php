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

use Psr\Http\Message\UploadedFileInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class FileException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class FileException extends AbstractCoreException
{
    private $uploadedFile;

    /**
     * FileException constructor.
     *
     * @param UploadedFileInterface $uploadedFile
     * @param string                $message
     * @param int                   $code
     * @param \Exception            $previous
     */
    public function __construct(
        UploadedFileInterface $uploadedFile,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->uploadedFile = $uploadedFile;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return UploadedFileInterface
     */
    public function getUploadedFile() : UploadedFileInterface
    {
        return $this->uploadedFile;
    }
}