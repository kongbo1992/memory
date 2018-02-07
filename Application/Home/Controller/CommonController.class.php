<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    protected $me = array('id' => 0,'mobile' => '','nick_name' => '','portrait' => '','state'=>0,'user_name'=>'','openid' => '', 'autologin'=>0); //保存登录信息
    protected $html_pre = '';

    public function _initialize(){
        $bs_me = session("bsme");
        if ($bs_me){//session 验证
            $this->me = $bs_me;
        }
//        else{//cookie 验证
//            $identify = cookie("bsvalidateidentify");
//            if ($identify){
//                //cookie中有用户身份
//                $anth_handle = new OrgUserAuth();
//                if($orgid = $anth_handle->verifyAuthKey($identify,OrgUserAuth::LOGIN_TYPE_PC)){
//                    if($org_info = M("jobs_org")->where("id = $orgid and state <> 4 ")->find()){
//                        $this->me['id'] = $org_info['id'];
//                        $this->me['state'] = $org_info['state'];
//                        $this->me['user_mobile'] = $org_info['user_mobile'];
//                        $this->me['org_name'] = $org_info['org_name'];
//                        $this->me['org_phone'] = $org_info["org_phone"];
//                        session("bsme",$this->me); //保存登录状态
//                        $new_authkey = $anth_handle->updAuthKey($org_info['id'],OrgUserAuth::LOGIN_TYPE_PC);
//                        cookie("bsvalidateidentify",$new_authkey,86400*7);//更新cookie验证token
//                    }else{
//                        cookie("bsvalidateidentify",null);
//                    }
//                }else{
//                    cookie("bsvalidateidentify",null);
//                }
//            }
//        }
        //设置布局文件  输出格式化
        header("Content-type:text/html;charset=utf-8");
        //将用户基础数据分配到每个页面
        $this->assign('business_info' , $this ->me);
    }

    protected function _checkLogin(){
        if (!$this->_isLogin()){
            if(IS_AJAX){
                $this->ajaxReturn(['code'=>401,'msg'=>'您还没有登录']);
            }
            $this->_gotoLogin();
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