<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    protected $me = array('id' => 0,'user_mobile' => '','org_phone' => '','state'=>0,'org_name'=>'','openid' => '', 'autologin'=>0); //保存登录信息
    protected $html_pre = '';
    protected function _checkLogin(){
        if (!$this->_isLogin()){
            if(IS_AJAX){
                $this->ajaxReturn(['code'=>401,'msg'=>"尚未登录"]);
            }
            $this->_gotoLogin();
        }
        if(strtolower(CONTROLLER_NAME) != 'audit' ){
            if($this->isMobile()){
                if($this->me['state'] == 0){
                    redirect(U('Audit/basic_info'));
                }else if($this->me['state'] != 3){
                    redirect(U('Audit/audit_results'));
                }
            }else{
                if($this->me['state'] == 0){
                    redirect(U('Audit/index'));
                }
            }
        }
    }
    //某些需要根据是否登录，展示当前用户相关数据的场景
    protected function _isLogin(){
        return ( $this->me["id"] > 0 );
    }
    //去登陆
    protected function _gotoLogin(){
        $url = urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING']);
        header("Location:http://".$_SERVER["HTTP_HOST"]."/index.php/Home/Site/login?redirect=".$url);
        exit();
    }

    protected function isMobile(){
        return (USER_AGENT_IS_MOBILE === 1);
    }

}