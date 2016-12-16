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

namespace Vain\Core\Security\Access\Decorator;

use Psr\Http\Message\ServerRequestInterface;
use Vain\Core\Security\Access\AccessControlInterface;
use Vain\Core\Security\Token\SecurityTokenInterface;

/**
 * Class AbstractAccessControlDecorator
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractAccessControlDecorator implements AccessControlInterface
{
    private $accessControl;

    /**
     * AbstractAccessControlDecorator constructor.
     *
     * @param AccessControlInterface $accessControl
     */
    public function __construct(AccessControlInterface $accessControl)
    {
        $this->accessControl = $accessControl;
    }

    /**
     * @inheritDoc
     */
    public function isAllowed(
        array $accessConfigData,
        SecurityTokenInterface $token,
        ServerRequestInterface $request
    ) : bool
    {
        return $this->accessControl->isAllowed($accessConfigData, $token, $request);
    }

    /**
     * @inheritDoc
     */
    public function getName() : string
    {
        return $this->accessControl->getName();
    }
}
