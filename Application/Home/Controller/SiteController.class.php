<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Home\Model\LoginModel;
//use Common\Business\OrgEvent;
//use Common\Common\SendRdyxMsg;
class SiteController extends CommonController {
    public function login(){
        if($this->_isLogin()){
            if (IS_POST) {
                $this->ajaxReturn(['code'=>200,'msg'=>'登录成功!']);
            }
            redirect(U('Index/index'));
        }
        if (IS_POST) {
            $login = D('Login');
            if (!$data = $login->create()) {
                $this->ajaxReturn(['code'=>201,'msg'=>$login->getError()]);
            }
            $list = M("jobs_org")->where("user_mobile = '".$_POST['user_mobile']."' and state <> 4 ")->find();
            if($list){
                if($list['id'] && $list['user_pwd'] == $data['user_pwd']){
                    $openid = '';
                    if ($this->me["openid"] != ""){
                        //如果是微信记录下用户的openid
                        $openid = $this->me["openid"];
                    }
                    OrgEvent::after_web_login($this->me,$list,$openid);
                    $this->ajaxReturn(['code'=>200,'msg'=>'登录成功!']);
                }
            }
            $this->ajaxReturn(['code'=>201,'msg'=>'用户名或密码错误！']);
        } else {
            $this->assign('title','单位用户登录');
            $this->display($this->html_pre."login");
        }
    }

    public function details(){

    }
}