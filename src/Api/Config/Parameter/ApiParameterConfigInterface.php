<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Config\Parameter;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\Parameter\Result\ApiConfigParameterResultInterface;
use Vain\Core\ArrayX\ArrayInterface;
use Vain\Core\Http\Request\Handler\RequestHandlerInterface;

/**
 * Interface ApiParameterConfigInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method ApiConfigParameterResultInterface handle(ServerRequestInterface $request)
 */
interface ApiParameterConfigInterface extends RequestHandlerInterface, ArrayInterface
{
}
