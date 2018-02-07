<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->_checkLogin();
//        $data = M("tb_user")->find();
        $data = M("tb_module")->where("status = 0")->select();
        $this->assign('data',$data);
//        var_dump($data);die;
        $this->assign('title',"我们的记忆");
        $this->display();
    }

    public function details(){
        $this->_checkLogin();

    }

    public function update(){
        $this->_checkLogin();
        $this->display();
    }

    /*
     * 照片墙
     */
    public function photowall(){
        $this->_checkLogin();
        $data = M("tb_module_photo")->where("pid = 2")->select();
        $album = M("tb_module")->where("id = 2")->find();
//        var_dump($album);die;

        $this->assign('data',$data);
        $this->assign('album',$album);
//        var_dump($data);die;
        $this->assign('title',$album['title']);
        $this->display("photo-wall");
    }

    public function upload()
      {
          $setting = C('UPLOAD_FILE_QINIU');
          $Upload = new \Think\Upload($setting);
          var_dump($_FILES);die;
          $info = $Upload->upload($_FILES);
          $path = str_replace('/','_',$info['file']['savepath']);
          $filename = $path.$info['file']['savename'];//七牛云保存的文件名称

         if(!$info)
         {
             $data = ['status'=>0,'msg'=>'上传失败，'.$Upload->getError()];
         }
         else
         {
                 $data = [
                         'status'=>1,
                 'msg'   => '上传成功',
                 'name'  => $_FILES['file']['name'],
                 'size'  => $_FILES['file']['size'],
                 'cname' => $filename,
                 'type'  => $info['file']['ext'],
                 'link'  => $info['file']['url'],
             ];
         }
          var_dump($info);die;
         echo json_encode($data);
         exit;
     }
}