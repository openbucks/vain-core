<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Config\Data\Provider\Reader;

use Vain\Core\Config\Data\Provider\ConfigDataProviderInterface;
use Vain\Core\Config\Data\Reader\Factory\ReaderFactoryInterface;
use Vain\Core\Config\Data\Reader\ReaderInterface;

/**
 * Class ReaderConfigDataProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ReaderConfigDataProvider implements ConfigDataProviderInterface
{
    private $readers;

    private $readerFactory;

    /**
     * ReaderConfigDataProvider constructor.
     *
     * @param ReaderFactoryInterface $readerFactory
     * @param ReaderInterface[]      $readers
     */
    public function __construct(ReaderFactoryInterface $readerFactory, array $readers = [])
    {
        $this->readerFactory = $readerFactory;
        $this->readers = $readers;
    }

    /**
     * @inheritdoc
     */
    public function getConfigData(string $fileName) : array
    {
        if (false === array_key_exists($fileName, $this->readers)) {
            $this->readers[$fileName] = $this->readerFactory->createReader($fileName);
        }

        return $this->readers[$fileName]->read();
    }
}
