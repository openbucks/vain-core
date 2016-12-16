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

namespace Vain\Core\Http\Request;

use Psr\Http\Message\RequestInterface as Psr7RequestInterface;
use Vain\Core\Http\Message\VainMessageInterface;

/**
 * Interface VainRequestInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface VainRequestInterface extends Psr7RequestInterface, VainMessageInterface
{
    /**
     * @return string
     */
    public function getContents() : string;
}