<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-operation
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-operation
 */
declare(strict_types = 1);

namespace Vain\Core\Operation\Decorator\Logger;

use Psr\Log\LoggerInterface;
use Vain\Core\Operation\Decorator\AbstractOperationDecorator;
use Vain\Core\Operation\OperationInterface;
use Vain\Core\Result\ResultInterface;

/**
 * Class OperationLoggerDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class OperationLoggerDecorator extends AbstractOperationDecorator
{
    private $logger;

    private $id;

    /**
     * AbstractVainOperationLoggerDecorator constructor.
     *
     * @param LoggerInterface    $logger
     * @param string             $id
     * @param OperationInterface $operation
     */
    public function __construct(LoggerInterface $logger, string $id, OperationInterface $operation)
    {
        $this->logger = $logger;
        $this->id = $id;
        parent::__construct($operation);
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }

    /**
     * @return string
     */
    public function getId() : string
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function execute() : ResultInterface
    {
        $this->logger->debug(sprintf('Ready to execute operation %s with id %s', $this->getName(), $this->id));
        $result = parent::execute();
        if (false === $result->getStatus()) {
            $this->logger->debug(sprintf('Failed to execute operation with %s id %s', $this->getName(), $this->id));
        } else {
            $this->logger->debug(sprintf('Successfully executed operation %s with id %s', $this->getName(), $this->id));
        }

        return $result;
    }
}
