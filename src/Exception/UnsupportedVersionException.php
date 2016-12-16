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

use Vain\Core\Http\Message\VainMessageInterface;

/**
 * Class UnsupportedVersionException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedVersionException extends MessageException
{
    /**
     * UnsupportedVersionException constructor.
     *
     * @param VainMessageInterface $httpMessage
     * @param string               $version
     */
    public function __construct(VainMessageInterface $httpMessage, string $version)
    {
        parent::__construct($httpMessage, sprintf('Http protocol version %s is not supported', $version));
    }
}