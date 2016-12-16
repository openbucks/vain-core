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

use Vain\Core\Security\Access\AccessControlInterface;

/**
 * Class NoRequiredFieldAccessControlException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class NoRequiredFieldAccessControlException extends AccessControlException
{
    /**
     * NoRequiredFieldAccessControlException constructor.
     *
     * @param AccessControlInterface $accessControl
     * @param string                 $endpointName
     * @param string                 $requiredField
     */
    public function __construct(
        AccessControlInterface $accessControl,
        string $endpointName,
        string $requiredField
    ) {
        parent::__construct(
            $accessControl,
            sprintf(
                'Required field %s is missing from access control config for endpoint %s',
                $requiredField,
                $endpointName
            )
        );
    }
}
