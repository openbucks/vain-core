<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Security\Config\Factory\SecurityConfigFactoryInterface;

/**
 * Class SecurityConfigFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityConfigFactoryException extends AbstractCoreException
{
    private $configFactory;

    /**
     * SecurityConfigFactoryException constructor.
     *
     * @param SecurityConfigFactoryInterface $configFactory
     * @param string                         $message
     * @param int                            $code
     * @param \Exception|null                $previous
     */
    public function __construct(
        SecurityConfigFactoryInterface $configFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->configFactory = $configFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return SecurityConfigFactoryInterface
     */
    public function getConfigFactory(): SecurityConfigFactoryInterface
    {
        return $this->configFactory;
    }
}
