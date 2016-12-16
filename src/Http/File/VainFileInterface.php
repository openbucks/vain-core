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

namespace Vain\Core\Http\File;

use Psr\Http\Message\UploadedFileInterface as HttpUploadedFileInterface;
use Vain\Core\Http\Stream\VainStreamInterface;

/**
 * Interface VainFileInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method VainStreamInterface getStream
 */
interface VainFileInterface extends HttpUploadedFileInterface
{
}