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

use Vain\Core\Api\Config\Parameter\Factory\ApiParameterConfigFactoryInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ApiParameterConfigFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiParameterConfigFactoryException extends AbstractCoreException
{
    private $parameterConfigFactory;

    /**
     * ApiParameterConfigFactoryException constructor.
     *
     * @param ApiParameterConfigFactoryInterface $parameterConfigFactory
     * @param string                             $message
     * @param int                                $code
     * @param \Exception|null                    $previous
     */
    public function __construct(
        ApiParameterConfigFactoryInterface $parameterConfigFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->parameterConfigFactory = $parameterConfigFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApiParameterConfigFactoryInterface
     */
    public function getParameterConfigFactory(): ApiParameterConfigFactoryInterface
    {
        return $this->parameterConfigFactory;
    }
}
