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

namespace Vain\Core\Http\Application;

use Vain\Core\Application\ApplicationInterface;
use Vain\Core\Http\Request\VainServerRequestInterface;
use Vain\Core\Http\Response\VainResponseInterface;

/**
 * Interface HttpApplicationInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface HttpApplicationInterface extends ApplicationInterface
{
    /**
     * @param VainServerRequestInterface $request
     *
     * @return VainResponseInterface
     */
    public function handleRequest(VainServerRequestInterface $request) : VainResponseInterface;
}