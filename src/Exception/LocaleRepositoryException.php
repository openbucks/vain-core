<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-time
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-time
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Time\Locale\Repository\LocaleRepositoryInterface;

/**
 * Class LocaleRepositoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LocaleRepositoryException extends AbstractCoreException
{
    private $repository;

    /**
     * LocaleRepositoryException constructor.
     *
     * @param LocaleRepositoryInterface $repository
     * @param string                    $message
     * @param int                       $code
     * @param \Exception|null           $previous
     */
    public function __construct(
        LocaleRepositoryInterface $repository,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->repository = $repository;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return LocaleRepositoryInterface
     */
    public function getRepository(): LocaleRepositoryInterface
    {
        return $this->repository;
    }
}