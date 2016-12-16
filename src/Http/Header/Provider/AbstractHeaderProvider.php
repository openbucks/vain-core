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

namespace Vain\Core\Http\Header\Provider;

/**
 * Class AbstractHeaderProvider
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
abstract class AbstractHeaderProvider implements HeaderProviderInterface
{
    private $next;

    /**
     * AbstractHeaderProvider constructor.
     *
     * @param HeaderProviderInterface $provider
     */
    public function __construct(HeaderProviderInterface $provider)
    {
        $this->next = $provider;
    }

    /**
     * @return HeaderProviderInterface
     */
    public function getNext() : HeaderProviderInterface
    {
        return $this->next;
    }
}