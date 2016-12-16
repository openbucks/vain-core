<?php
/**
 * Vain Framework
 *
 * PHP Version 7
 *
 * @package   vain-config
 * @license   https://opensource.org/licenses/MIT MIT License
 * @link      https://github.com/allflame/vain-config
 */
declare(strict_types = 1);

namespace Vain\Core\Config\Data\Handler\Yaml;

use Vain\Core\Config\Data\Handler\AbstractHandler;
use Symfony\Component\Yaml\Yaml as SymfonyYamlReader;

/**
 * Class YamlHandler
 *
 * @author Taras P. Girnyk <taras.p.gyrnik@gmail.com>
 */
class YamlHandler extends AbstractHandler
{
    /**
     * YamlHandler constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        parent::__construct($fileName, 'yml');
    }

    /**
     * @inheritdoc
     */
    public function read() : array
    {
        $fullName = $this->getFullName();
        if (false === file_exists($fullName)) {
            return [];
        }
        if (false === ($contents = file_get_contents($fullName))) {
            return [];
        }
        if ('' === $contents) {
            return [];
        }

        if (null === ($data = SymfonyYamlReader::parse($contents))) {
            return [];
        }

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function write(array $data) : bool
    {
        $string = SymfonyYamlReader::dump($data);
        $fullName = $this->getFullName();
        if (false === file_exists(dirname($fullName))) {
            mkdir(dirname($fullName), 0755, true);
        }
        if (false === (file_put_contents($fullName, $string))) {
            return false;
        }

        return true;
    }
}
