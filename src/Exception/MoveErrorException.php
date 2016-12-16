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

/**
 * Class MoveErrorException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class MoveErrorException extends FileException
{
    /**
     * MoveErrorException constructor.
     *
     * @param UploadedFileInterface $uploadedFile
     * @param string                $targetPath
     */
    public function __construct(UploadedFileInterface $uploadedFile, string $targetPath)
    {
        parent::__construct($uploadedFile, sprintf('Cannot move file to %s', $targetPath));
    }
}