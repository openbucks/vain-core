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

namespace Vain\Core\Http\File\Factory;

use Psr\Http\Message\UploadedFileInterface;

/**
 * Interface FileFactoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface FileFactoryInterface
{
    /**
     * @param string $source
     * @param int    $size
     * @param int    $error
     * @param string $fileName
     * @param string $mediaType
     *
     * @return UploadedFileInterface
     */
    public function createFile(
        string $source,
        int $size,
        int $error,
        string $fileName,
        string $mediaType
    ) : UploadedFileInterface;
}