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

use Vain\Core\Locale\LocaleInterface;
use Vain\Core\Time\Locale\Repository\LocaleRepositoryInterface;

/**
 * Class DuplicateRepositoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateRepositoryException extends LocaleRepositoryException
{
    private $new;

    private $old;

    /**
     * DuplicateRepositoryException constructor.
     *
     * @param LocaleRepositoryInterface $localeRepository
     * @param string                    $name
     * @param LocaleInterface           $new
     * @param LocaleInterface           $old
     */
    public function __construct(
        LocaleRepositoryInterface $localeRepository,
        string $name,
        LocaleInterface $new,
        LocaleInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $localeRepository,
            sprintf(
                'Trying to register locale %s by the same name %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return LocaleInterface
     */
    public function getNew() : LocaleInterface
    {
        return $this->new;
    }

    /**
     * @return LocaleInterface
     */
    public function getOld() : LocaleInterface
    {
        return $this->old;
    }
}