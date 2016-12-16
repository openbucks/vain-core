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

namespace Vain\Core\Time\Locale\Repository;

use Vain\Core\Exception\DuplicateRepositoryException;
use Vain\Core\Exception\UnknownLocaleException;
use Vain\Core\Locale\LocaleInterface;

/**
 * Class LocaleRepository
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class LocaleRepository implements LocaleRepositoryInterface
{
    private $locales;

    /**
     * LocaleRepository constructor.
     *
     * @param array $locales
     */
    public function __construct(array $locales = [])
    {
        $this->locales = $locales;
    }

    /**
     * @inheritDoc
     */
    public function getLocale(string $locale) : LocaleInterface
    {
        if (false === array_key_exists($locale, $this->locales)) {
            throw new UnknownLocaleException($this, $locale);
        }

        return $this->locales[$locale];
    }

    /**
     * @inheritDoc
     */
    public function getLocales() : array
    {
        return $this->locales;
    }

    /**
     * @inheritDoc
     */
    public function addLocale(LocaleInterface $locale) : LocaleRepositoryInterface
    {
        $name = $locale->getLanguage();
        if (array_key_exists($name, $this->locales)) {
            throw new DuplicateRepositoryException($this, $name, $locale, $this->locales[$name]);
        }
        $this->locales[$name] = $locale;

        return $this;
    }
}