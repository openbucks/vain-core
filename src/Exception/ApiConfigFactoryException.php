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

use Vain\Core\Api\Config\Factory\ApiConfigFactoryInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ApiConfigFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiConfigFactoryException extends AbstractCoreException
{
    private $apiConfigFactory;

    /**
     * ApiConfigFactoryException constructor.
     *
     * @param ApiConfigFactoryInterface $apiConfigFactory
     * @param string                    $message
     * @param int                       $code
     * @param \Exception|null           $previous
     */
    public function __construct(
        ApiConfigFactoryInterface $apiConfigFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->apiConfigFactory = $apiConfigFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApiConfigFactoryInterface
     */
    public function getApiConfigFactory(): ApiConfigFactoryInterface
    {
        return $this->apiConfigFactory;
    }
}
