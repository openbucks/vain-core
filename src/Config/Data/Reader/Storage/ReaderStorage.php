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

namespace Vain\Core\Config\Data\Reader\Storage;

use Vain\Core\Config\Data\Reader\Factory\ReaderFactoryInterface;
use Vain\Core\Config\Data\Reader\ReaderInterface;

/**
 * Class ReaderStorage
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ReaderStorage implements ReaderStorageInterface
{
    private $readerFactory;

    private $readers;

    /**
     * ReaderStorage constructor.
     *
     * @param ReaderFactoryInterface $readerFactory
     */
    public function __construct(ReaderFactoryInterface $readerFactory)
    {
        $this->readerFactory = $readerFactory;
    }

    /**
     * @inheritdoc
     */
    public function getReader(string $filename) : ReaderInterface
    {
        if (false === array_key_exists($filename, $this->readers)) {
            $this->readers[$filename] = $this->readerFactory->createReader($filename);
        }

        return $this->readers[$filename];
    }
}
