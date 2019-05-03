<?php

class ImageUtilities
{
    private const TARGET_DIR = "../../images/";

    public function getTargetFileName(string $name) : string
    {
        $type = $this->getFileType($name);

        return self::TARGET_DIR . $this->generateFileName() . "." . $type;
    }

    public function getFileType(string $name) : string
    {
        return strtolower(pathinfo(basename($name), PATHINFO_EXTENSION));
    }

    public function isImageTypeSupported(string $name) : bool
    {
        $type = $this->getFileType($name);
        return $type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif";
    }

    private function generateFileName()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}
?>