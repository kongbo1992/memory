<?php
/**
 * Created by gaorenhua.
 * User: 597170962 <597170962@qq.com>
 * Date: 2015/6/29
 * Time: 0:58
 */

namespace Home\Model;
use Think\Model;

class LoginModel extends Model {
    // 重新定义表
    protected $tableName = 'user';
    /**
     * 自动验证
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
     * self::MUST_VALIDATE 或者1 必须验证
     * self::VALUE_VALIDATE或者2 值不为空的时候验证
     */
    protected $_validate = array(
        array('user_mobile', 'require', '用户名不能为空！',1), //默认情况下用正则进行验证
        array('user_pwd', 'require', '登录密码不能为空！',1), // 默认情况下用正则进行验证
//        array('verify', 'verify_check', '验证码错误', 0, 'function'), // 判断验证码是否正确
        array('user_pwd', '/^([a-zA-Z0-9@*#]{6,22})$/', '密码格式不正确,请重新输入！', 0),
        array('user_mobile', '/^1[34578]\d{9}$/', '手机号码格式不正确', 0), // 正则表达式验证手机号码
    );

    /**
     * 自动完成
     */
    protected $_auto = array (
        /* 登录的时候自动完成 */
        array('user_pwd', 'get_password', 3, 'callback') , // 对password字段使用md5函数处理
//        array('lastdate', 'time', 1, 'function'), // 对lastdate字段在登录的时候写入当前时间戳
//        array('lastip', 'get_client_ip', 1, 'function'), // 对lastip字段在登录的时候写入当前登录ip地址
    );

    public function get_password($password){
        return md5(md5(md5(trim($password))));
    }
}