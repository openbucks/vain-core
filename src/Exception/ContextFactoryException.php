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

use Vain\Core\Contenxt\Factory\ContextFactoryInterface;

/**
 * Class ContextFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ContextFactoryException extends AbstractCoreException
{
    private $contextFactory;

    /**
     * ContextFactoryException constructor.
     *
     * @param ContextFactoryInterface $contextFactory
     * @param string                  $message
     * @param int                     $code
     * @param \Exception|null         $previous
     */
    public function __construct(
        ContextFactoryInterface $contextFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->contextFactory = $contextFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ContextFactoryInterface
     */
    public function getContextFactory(): ContextFactoryInterface
    {
        return $this->contextFactory;
    }
}