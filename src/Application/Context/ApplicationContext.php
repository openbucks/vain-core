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
 * Class ApplicationContext
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationContext implements ApplicationContextInterface
{
    private $hostName;

    private $pid;

    private $name;

    private $version;

    private $env;

    private $mode;

    /**
     * AbstractContext constructor.
     *
     * @param string $hostName
     * @param int    $pid
     * @param string $name
     * @param string $version
     * @param string $env
     * @param string $mode
     */
    public function __construct(string $hostName, int $pid, string $name, string $version, string $env, string $mode)
    {
        $this->hostName = $hostName;
        $this->pid = $pid;
        $this->name = $name;
        $this->version = $version;
        $this->env = $env;
        $this->mode = $mode;
    }

    /**
     * @return string
     */
    public function getHostName(): string
    {
        return $this->hostName;
    }

    /**
     * @return int
     */
    public function getPid(): int
    {
        return $this->pid;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getVersion(): string
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
    public function toDisplay(): array
    {
        return [
            'hostname' => $this->hostName,
            'pid'      => $this->pid,
            'name'     => $this->name,
            'version'  => $this->version,
            'env'      => $this->env,
            'mode'     => $this->mode,
        ];
    }

    /**
     * @inheritDoc
     */
    public function toPrivate(): array
    {
        return ['name' => $this->name, 'version' => $this->version];
    }
}
