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

use Vain\Core\Api\Config\Provider\ApiConfigProviderInterface;
use Vain\Core\Exception\AbstractCoreException;

/**
 * Class ApiConfigProviderException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ConfigProviderException extends AbstractCoreException
{
    private $configProvider;

    /**
     * ApiConfigProviderException constructor.
     *
     * @param ApiConfigProviderInterface $apiConfigProvider
     * @param string                     $message
     * @param int                        $code
     * @param \Exception|null            $previous
     */
    public function __construct(
        ApiConfigProviderInterface $apiConfigProvider,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->configProvider = $apiConfigProvider;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApiConfigProviderInterface
     */
    public function getConfigProvider() : ApiConfigProviderInterface
    {
        return $this->configProvider;
    }
}
