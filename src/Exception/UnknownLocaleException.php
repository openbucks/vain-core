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

use Vain\Core\Time\Locale\Repository\LocaleRepositoryInterface;

/**
 * Class UnknownLocaleException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnknownLocaleException extends LocaleRepositoryException
{
    /**
     * UnknownLocaleException constructor.
     *
     * @param LocaleRepositoryInterface $localeRepository
     * @param string                    $name
     */
    public function __construct(LocaleRepositoryInterface $localeRepository, string $name)
    {
        parent::__construct($localeRepository, sprintf('Locale %s is not registered', $name));
    }
}