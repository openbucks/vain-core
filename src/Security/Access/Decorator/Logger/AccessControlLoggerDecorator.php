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

namespace Vain\Core\Security\Access\Decorator\Logger;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Vain\Core\Security\Access\AccessControlInterface;
use Vain\Core\Security\Access\Decorator\AbstractAccessControlDecorator;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class AccessControlLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AccessControlLoggerDecorator extends AbstractAccessControlDecorator
{
    private $logger;

    /**
     * AccessControlLoggerDecorator constructor.
     *
     * @param AccessControlInterface $accessControl
     * @param LoggerInterface        $logger
     */
    public function __construct(AccessControlInterface $accessControl, LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct($accessControl);
    }

    /**
     * @inheritDoc
     */
    public function isAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool
    {
        $this->logger->debug(sprintf('Checking access control %s', $this->getName()));
        $result = parent::isAllowed($accessConfigData, $token, $request);
        $this->logger->debug(
            sprintf('Check %s for access control %s', $result ? 'passed' : 'failed', $this->getName())
        );

        return $result;
    }
}
