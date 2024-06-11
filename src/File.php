<?php


namespace Aoxiang\Bt;

use Exception;

class File extends Base
{
    /**
     * 系统状态相关接口
     *
     * @var string[]
     */
    protected $config = [
        'Upload'      => '/files?action=upload',    //上传文件
        'GetFileBody' => 'files?action=GetFileBody',//
        'GetDir'      => 'files?action=GetDir',
    ];

    /**
     *
     *
     * @param  string  $uploadPath     上传到服务器位置的路径
     * @param  string  $localFilePath  本地文件路径
     *
     * @return array|bool|mixed
     */
    public function upload(string $uploadPath, string $localFilePath)
    {
//f_path: /www/backup/database/
//f_name: watch_20220212_002337.sql.zip
//f_size: 22955485
//f_start: 0
        file($localFilePath);
        $fileName = explode('/', $localFilePath);
        $data     = [
            'f_path'  => $uploadPath,
            'f_name'  => last($fileName),
            'f_size'  => filesize($localFilePath),
            'f_start' => 0,
            'file'    => new \CURLFile($localFilePath, '', 'blob'),
        ];

        try {
            return $this->httpPostCookie($this->getUrl('Upload'), $data, $localFilePath);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }


    /**
     * @param  string  $path
     *
     * @return array|bool|mixed
     */
    public function getFileBody(string $path)
    {
        $data = [
            'path' => $path,
        ];

        try {
            return $this->httpPostCookie($this->getUrl('GetFileBody'), $data);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }

    /**
     * @param  string  $path
     * @param  string  $search
     * @param  int     $showRow
     * @param  int     $p
     * @param  bool    $isOperating
     *
     * @return array|bool|mixed
     */
    public function getDir(string $path, $search = '', $showRow = 100, $p = 1, $isOperating = true)
    {
//        p: 1
//showRow: 100
//path: /www/wwwroot
//is_operating: true
//search:
//
        $data = [
            'p'            => $p,
            'showRow'      => $showRow,
            'path'         => $path,
            'is_operating' => $isOperating,
            'search'       => $search,
        ];
        try {
            return $this->httpPostCookie($this->getUrl('GetDir'), $data);
        } catch (Exception $e) {
            return $this->error($e->getMessage());
        }
    }


}
