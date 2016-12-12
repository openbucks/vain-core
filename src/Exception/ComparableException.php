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

use Vain\Core\Comparable\ComparableInterface;

/**
 * Class AbstractComparable
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ComparableException extends AbstractCoreException
{
    private $what;

    private $to;

    /**
     * ComparableException constructor.
     *
     * @param ComparableInterface $what
     * @param ComparableInterface $to
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        ComparableInterface $what,
        ComparableInterface $to,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->what = $what;
        $this->to = $to;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ComparableInterface
     */
    public function getWhat(): ComparableInterface
    {
        return $this->what;
    }

    /**
     * @return ComparableInterface
     */
    public function getTo(): ComparableInterface
    {
        return $this->to;
    }
}
