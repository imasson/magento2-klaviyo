<?php
namespace Klaviyo\Reclaim\Logger;

use Magento\Framework\Filesystem\DriverInterface;
use Magento\Framework\Filesystem\DirectoryList;
use Monolog\Logger;

class Handler extends \Magento\Framework\Logger\Handler\Base
{
    /**
     * Logging level
     * @var int
     */
    protected $loggerType = Logger::INFO;

    /**
     * File name
     * @var string
     */
    protected $filePath;

    /**
     * @var DirectoryList
     */
    protected $_dir;

    /**
     * @var DriverInterface
     */
    protected $filesystem;

    public function __construct(
        DriverInterface $filesystem,
        DirectoryList $dir
    ) {
        $this->filesystem = $filesystem;
        $this->_dir = $dir;
        $this->filePath = $this->_dir->getPath('log') . '/klaviyo.log';
        parent::__construct(
            $this->filesystem,
            $filePath=$this->filePath
        );
    }
}