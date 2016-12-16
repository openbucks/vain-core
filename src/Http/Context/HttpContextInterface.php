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

namespace Vain\Core\Http\Context;

use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Interface ContextInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HttpContextInterface
{
    /**
     * @return VainServerRequestInterface
     */
    public function getCurrentRequest() : VainServerRequestInterface;

    /**
     * @return VainResponseInterface
     */
    public function getCurrentResponse() : VainResponseInterface;
}