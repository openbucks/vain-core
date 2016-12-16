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

namespace Vain\Core\Api\Config\Parameter;

/**
 * Class AbstractApiParameterConfig
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApiParameterConfig implements ApiParameterConfigInterface
{
    private $name;

    private $sourceName;

    private $type;

    private $source;

    private $optional;

    private $defaultValue;

    /**
     * AbstractApiParameterConfig constructor.
     *
     * @param string $name
     * @param string $sourceName
     * @param string $type
     * @param string $source
     * @param bool   $optional
     * @param mixed  $defaultValue
     */
    public function __construct(
        string $name,
        string $sourceName,
        string $type,
        string $source,
        bool $optional,
        $defaultValue
    ) {
        $this->name = $name;
        $this->sourceName = $sourceName;
        $this->type = $type;
        $this->source = $source;
        $this->optional = $optional;
        $this->defaultValue = $defaultValue;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSourceName(): string
    {
        return $this->sourceName;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return boolean
     */
    public function isOptional(): bool
    {
        return $this->optional;
    }

    /**
     * @inheritDoc
     */
    public function getDefaultValue()
    {
        return $this->defaultValue;
    }
}
