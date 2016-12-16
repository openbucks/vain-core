<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-security
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-security
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Security\Access\AccessControlInterface;

/**
 * Class AccessControlException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class AccessControlException extends AbstractCoreException
{
    private $accessControl;

    /**
     * AccessControlException constructor.
     *
     * @param AccessControlInterface $accessControl
     * @param string                 $message
     * @param int                    $code
     * @param \Exception|null        $previous
     */
    public function __construct(
        AccessControlInterface $accessControl,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->accessControl = $accessControl;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return AccessControlInterface
     */
    public function getAccessControl(): AccessControlInterface
    {
        return $this->accessControl;
    }
}
