<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-api
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-api
 */
declare(strict_types = 1);

namespace Vain\Core\Api\Config\Composite;

use Vain\Core\Config\Data\Provider\ConfigDataProviderInterface;

/**
 * Class ApiCompositeConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiCompositeConfig implements ApiCompositeConfigInterface
{
    private $configDataProvider;

    private $files;

    private $data;

    /**
     * ApiCompositeConfig constructor.
     *
     * @param ConfigDataProviderInterface $configDataProvider
     * @param array                       $files
     */
    public function __construct(ConfigDataProviderInterface $configDataProvider, array $files = [])
    {
        $this->configDataProvider = $configDataProvider;
        $this->files = $files;
    }

    /**
     * @inheritDoc
     */
    public function addFile(string $filename) : ApiCompositeConfigInterface
    {
        $this->files[] = $filename;

        return $this;
    }

    /**
     * @return array
     */
    public function getConfigData()
    {
        $filesData = [];
        foreach ($this->files as $file) {
            $filesData[] = $this->configDataProvider->getConfigData($file);
        }

        return array_merge(...$filesData);
    }

    /**
     * @inheritdoc
     */
    public function current()
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        return current($this->data);
    }

    /**
     * @inheritdoc
     */
    public function next()
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        return next($this->data);
    }

    /**
     * @inheritdoc
     */
    public function key()
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        return key($this->data);
    }

    /**
     * @inheritdoc
     */
    public function valid()
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        return false !== $this->current();
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        return reset($this->data);
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        return array_key_exists($offset, $this->data);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        if (false === $this->offsetExists($offset)) {
            return null;
        }

        return $this->data[$offset];
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        $this->data[$offset] = $value;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        if (null === $this->data) {
            $this->data = $this->getConfigData();
        }

        if (false === $this->offsetExists($offset)) {
            return $this;
        }

        unset($this->data[$offset]);

        return $this;
    }
}
