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

use Vain\Core\Http\Uri\Factory\UriFactoryInterface;

/**
 * Class UnsupportedUriException
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class UnsupportedUriException extends UriFactoryException
{
    /**
     * UnsupportedUriException constructor.
     *
     * @param UriFactoryInterface $uriFactory
     * @param string              $uri
     */
    public function __construct(UriFactoryInterface $uriFactory, string $uri)
    {
        parent::__construct($uriFactory, sprintf('Unable to parse uri %s', $uri));
    }
}