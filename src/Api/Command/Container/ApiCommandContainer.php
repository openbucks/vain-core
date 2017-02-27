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

namespace Vain\Core\Api\Command\Container;

use Psr\Container\ContainerInterface;
use Vain\Core\Api\Command\ApiCommandInterface;
use Vain\Core\Api\Config\ApiConfigInterface;
use Vain\Core\Api\Request\ApiRequestInterface;
use Vain\Core\Api\Response\ApiResponseInterface;

/**
 * Class ApiCommandContainer
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiCommandContainer implements ApiCommandInterface
{
    private $container;

    private $commandPrefix;

    private $commandName;

    /**
     * ApiCommandContainer constructor.
     *
     * @param ContainerInterface $container
     * @param string             $commandPrefix
     * @param string             $commandName
     */
    public function __construct(ContainerInterface $container, string $commandPrefix, string $commandName)
    {
        $this->container = $container;
        $this->commandPrefix = $commandPrefix;
        $this->commandName = $commandName;
    }

    /**
     * @inheritDoc
     */
    public function execute(ApiRequestInterface $apiRequest, ApiConfigInterface $apiConfig) : ApiResponseInterface
    {
        return $this->container->get(
            sprintf(
                '%s.%s.%s',
                $this->commandPrefix,
                $this->commandName,
                $apiConfig->getHandlerAlias()
            )
        )->execute($apiRequest, $apiConfig);
    }
}
