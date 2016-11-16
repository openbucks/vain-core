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
use Vain\Core\Application\Module\Storage\ApplicationModuleStorageInterface;

/**
 * Class DuplicateApplicationModuleException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class DuplicateApplicationModuleException extends ApplicationModuleStorageException
{

    private $new;

    private $old;

    /**
     * DuplicateApplicationModuleException constructor.
     *
     * @param ApplicationModuleStorageInterface $moduleStorage
     * @param string                            $name
     * @param ApplicationModuleInterface        $new
     * @param ApplicationModuleInterface        $old
     */
    public function __construct(
        ApplicationModuleStorageInterface $moduleStorage,
        string $name,
        ApplicationModuleInterface $new,
        ApplicationModuleInterface $old
    ) {
        $this->new = $new;
        $this->old = $old;
        parent::__construct(
            $moduleStorage,
            sprintf(
                'Trying to register application module %s by the same alias %s as %s',
                get_class($new),
                $name,
                get_class($old)
            )
        );
    }

    /**
     * @return ApplicationModuleInterface
     */
    public function getNew() : ApplicationModuleInterface
    {
        return $this->new;
    }

    /**
     * @return ApplicationModuleInterface
     */
    public function getOld() : ApplicationModuleInterface
    {
        return $this->old;
    }
}