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
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Application\Module\ApplicationModuleInterface;

/**
 * Class ApplicationModuleException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class ApplicationModuleException extends AbstractCoreException
{
    private $module;

    /**
     * ApplicationModuleException constructor.
     *
     * @param ApplicationModuleInterface $module
     * @param string                     $message
     * @param int                        $code
     * @param \Exception|null            $previous
     */
    public function __construct(ApplicationModuleInterface $module, string $message, int $code = 500, \Exception $previous = null)
    {
        $this->module = $module;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ApplicationModuleInterface
     */
    public function getModule(): ApplicationModuleInterface
    {
        return $this->module;
    }
}