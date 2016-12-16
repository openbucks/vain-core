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
use Vain\Core\Name\Storage\AbstractNameableStorage;

/**
 * Class LocaleStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 *
 * @method LocaleInterface getItem(string $name)
 */
class LocaleStorage extends AbstractNameableStorage implements LocaleStorageInterface
{
    /**
     * @inheritDoc
     */
    public function getLocale(string $name) : LocaleInterface
    {
        return $this->getItem($name);
    }

    /**
     * @inheritDoc
     */
    public function getLocales() : array
    {
        return $this->getItems();
    }
}