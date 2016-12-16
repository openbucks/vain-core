<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-http
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-http
 */
declare(strict_types = 1);

namespace Vain\Core\Exception;

use Vain\Core\Exception\AbstractCoreException;
use Vain\Core\Http\Uri\Factory\UriFactoryInterface;

/**
 * Class UriFactoryException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UriFactoryException extends AbstractCoreException
{
    private $uriFactory;

    /**
     * UriFactoryException constructor.
     *
     * @param UriFactoryInterface $uriFactory
     * @param string              $message
     * @param int                 $code
     * @param \Exception|null     $previous
     */
    public function __construct(
        UriFactoryInterface $uriFactory,
        string $message,
        int $code = 500,
        \Exception $previous = null
    ) {
        $this->uriFactory = $uriFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return UriFactoryInterface
     */
    public function getUriFactory() : UriFactoryInterface
    {
        return $this->uriFactory;
    }
}