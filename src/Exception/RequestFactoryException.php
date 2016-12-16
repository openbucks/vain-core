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

namespace Vain\Core\Exception;

use Vain\Core\Api\Request\Factory\ApiRequestFactoryInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ApiRequestFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class RequestFactoryException extends AbstractCoreException
{
    private $requestFactory;

    /**
     * ApiRequestFactoryException constructor.
     *
     * @param ApiRequestFactoryInterface $apiRequestFactory
     * @param string                     $message
     * @param int                        $code
     * @param \Exception|null            $previous
     */
    public function __construct(
        ApiRequestFactoryInterface $apiRequestFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->requestFactory = $apiRequestFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApiRequestFactoryInterface
     */
    public function getRequestFactory() : ApiRequestFactoryInterface
    {
        return $this->requestFactory;
    }
}
