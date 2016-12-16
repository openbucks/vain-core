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

namespace Vain\Core\Api\Request\Validator;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\Validator\Result\ApiValidatorResultInterface;

/**
 * Interface ApiRequestValidatorInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface ApiValidatorInterface
{
    /**
     * @param ServerRequestInterface $serverRequest
     * @param ApiConfigInterface     $apiConfig
     *
     * @return ApiValidatorResultInterface
     */
    public function validate(
        ServerRequestInterface $serverRequest,
        ApiConfigInterface $apiConfig
    ) : ApiValidatorResultInterface;
}
