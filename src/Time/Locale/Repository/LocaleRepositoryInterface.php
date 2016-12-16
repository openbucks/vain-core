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

use Vain\Core\Locale\LocaleInterface;

/**
 * Interface LocaleRepositoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LocaleRepositoryInterface
{
    /**
     * @param string $string
     *
     * @return LocaleInterface
     */
    public function getLocale(string $string) : LocaleInterface;

    /**
     * @return LocaleInterface[]
     */
    public function getLocales() : array;

    /**
     * @param LocaleInterface $locale
     *
     * @return LocaleRepositoryInterface
     */
    public function addLocale(LocaleInterface $locale) : LocaleRepositoryInterface;
}