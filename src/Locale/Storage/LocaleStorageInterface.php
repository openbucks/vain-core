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

namespace Vain\Core\Locale\Storage;

use Vain\Core\Locale\LocaleInterface;

/**
 * Interface LocaleRepositoryInterface
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
interface LocaleStorageInterface
{
    /**
     * @param string $name
     *
     * @return LocaleInterface
     */
    public function getLocale(string $name) : LocaleInterface;

    /**
     * @return LocaleInterface[]
     */
    public function getLocales() : array;
}