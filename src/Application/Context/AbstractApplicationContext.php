<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-core
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-core
 */

namespace Vain\Core\Application\Context;

/**
 * Class AbstractApplicationContext
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractApplicationContext implements ApplicationContextInterface
{
    private $name;

    private $version;

    private $env;

    private $mode;

    /**
     * AbstractContext constructor.
     *
     * @param string $name
     * @param string $version
     * @param string $env
     * @param string $mode
     */
    public function __construct(string $name, string $version, string $env, string $mode)
    {
        $this->name = $name;
        $this->version = $version;
        $this->env = $env;
        $this->mode = $mode;
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getVersion() : string
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getEnv(): string
    {
        return $this->env;
    }

    /**
     * @return string
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * @inheritDoc
     */
    public function toArray() : array
    {
        return ['name' => $this->name, 'version' => $this->version, 'env' => $this->env, 'mode' => $this->mode];
    }
}
