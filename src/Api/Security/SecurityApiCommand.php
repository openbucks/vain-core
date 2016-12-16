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

namespace Vain\Core\Api\Security;

use Vain\Core\Api\Command\AbstractApiCommand;
use Vain\Core\Api\Command\ApiCommandInterface;
use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Response\ApiResponseInterface;
use Vain\Core\Api\Security\Response\Factory\ApiSecurityResponseFactoryInterface;
use Vain\Core\Security\Processor\SecurityProcessorInterface;

/**
 * Class SecurityApiCommand
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class SecurityApiCommand extends AbstractApiCommand
{
    private $securityProcessor;

    private $responseFactory;

    /**
     * SecurityApiCommand constructor.
     *
     * @param ApiCommandInterface                 $apiCommand
     * @param SecurityProcessorInterface          $securityProcessor
     * @param ApiSecurityResponseFactoryInterface $responseFactory
     */
    public function __construct(
        ApiCommandInterface $apiCommand,
        SecurityProcessorInterface $securityProcessor,
        ApiSecurityResponseFactoryInterface $responseFactory
    ) {
        $this->securityProcessor = $securityProcessor;
        $this->responseFactory = $responseFactory;
        parent::__construct($apiCommand);
    }

    /**
     * @inheritDoc
     */
    public function execute(ApiRequestInterface $apiRequest, ApiConfigInterface $apiConfig) : ApiResponseInterface
    {
        if (false === $this->securityProcessor->isAllowed($apiConfig->getSecurityConfig(), $apiRequest)) {
            return $this->responseFactory->createAccessDeniedResponse($apiRequest);
        }

        return $this->getNextCommand()->execute($apiRequest, $apiConfig);
    }
}
