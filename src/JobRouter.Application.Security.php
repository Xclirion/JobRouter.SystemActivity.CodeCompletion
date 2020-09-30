<?php

namespace JobRouter\Application\Security;

class CryptoService {
    public function __construct(\Closure $legacyEncryptFunction, \Closure $legacyDecryptFunction) {}
    public function legacyEncrypt($cipher) {}
    public function legacyDecrypt($cipher) {}
    /**
     * @return string
     * @throws \JobRouterException
     */
    public function generateFileEncryptionKey() : string {}
    /**
     * Careful, the returned StreamInterface is not automatically rewinded
     * @param $output
     * @param int $byteSize
     * @return mixed
     * @throws \Exception
     */
    public function writeRandomBytes($output, int $byteSize) {}
    /**
     * Also rewinds the returned StreamInterface
     * @param int $byteSize
     * @param $stream
     * @return mixed
     * @throws \Exception
     */
    public function generateRandomBytes(int $byteSize, $stream) {}
    /**
     * @param $input
     * @param $out
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public function encryptStream($input, $out, string $key) {}
    /**
     * @param $input
     * @param $out
     * @param string $key
     * @param string $iv
     * @return mixed
     * @throws \Exception
     */
    public function encryptStreamWithIV($input, $out, string $key, string $iv) {}
    /**
     * @param $input
     * @param $output
     * @param string $key
     * @return mixed
     * @throws \Exception
     */
    public function decryptStream($input, $output, string $key) {}
    /**
     * @param string $plainInputFile
     * @param string $encryptedOutputFile
     * @param string $secretKey
     * @return void
     * @throws \JobRouterException
     * @throws \Exception
     */
    public function encryptFile(string $plainInputFile, string $encryptedOutputFile, string $secretKey) : void {}
    /**
     * @param $encryptedInputFile
     * @param $decryptedOutputFile
     * @param $secretKey
     * @return void
     * @throws \JobRouterException
     * @throws \Exception
     */
    public function decryptFile($encryptedInputFile, $decryptedOutputFile, $secretKey) : void {}
    /**
     * @param $length
     * @param int $maxEfforts
     * @return string
     * @throws \Exception
     */
    private function generateSecureRandomBytes(int $length, int $maxEfforts=50) : string {}
    /**
     * @param $inputFile
     * @param $outputFile
     * @throws \JobRouterException
     */
    private function ensureValidFileStates($inputFile, $outputFile) : void {}
    /**
     * @param $stream
     * @throws \Exception
     */
    private function ensureValidDecryptInput($stream) : void {}
}