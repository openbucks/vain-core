<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Application\Context\Factory\ApplicationContextFactoryInterface;

/**
 * Class ApplicationContextFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationContextFactoryException extends AbstractCoreException
{
    private $contextFactory;

    /**
     * ContextFactoryException constructor.
     *
     * @param ApplicationContextFactoryInterface $contextFactory
     * @param string                             $message
     * @param int                                $code
     * @param \Exception|null                    $previous
     */
    public function __construct(
        ApplicationContextFactoryInterface $contextFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->contextFactory = $contextFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApplicationContextFactoryInterface
     */
    public function getContextFactory(): ApplicationContextFactoryInterface
    {
        return $this->contextFactory;
    }
}
