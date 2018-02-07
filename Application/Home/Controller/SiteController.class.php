<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Home\Model\LoginModel;
use Common\Common\OrgEvent;
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
            $list = M("user")->where("user_name = '".$_POST['user_mobile']."' ")->find();
            if($list){

                if($list['id'] && $list['password'] == $data['user_pwd']){
                    $openid = '';
                    if ($this->me["openid"] != ""){
                        //如果是微信记录下用户的openid
                        $openid = $this->me["openid"];
                    }
                    $this->me['id'] = $list['id'];
                    $this->me['user_name'] = $list['user_name'];
                    $this->me['nick_name'] = $list['nick_name'];
                    $this->me['mobile'] = $list['mobile'];
                    $this->me['portrait'] = $list['portrait'];
                    OrgEvent::after_web_login($this->me,$list,$openid);
                    $this->ajaxReturn(['code'=>200,'msg'=>'登录成功!']);
                }
            }
            $this->ajaxReturn(['code'=>201,'msg'=>'用户名或密码错误！']);
        } else {
            layout(false);
            $this->assign('title','单位用户登录');
            $this->display($this->html_pre."login");
        }
    }

    public function details(){

    }
}