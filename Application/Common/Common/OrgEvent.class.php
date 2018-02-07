<?php
namespace Common\Common;
use Common\Common\auth\OrgUserAuth;
use Common\Common\DistStorage;
use Common\Common\Elasticsearch;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/14
 * Time: 16:14
 */
class OrgEvent
{
    /**企业用户登录
     * @param $me
     * @param $user_info
     * @param string $openid
     * @param bool $remember
     */
    public static function after_web_login($me,$user_info,$openid='',$remember = true){
        $me['id'] = $user_info['id'];
//        $me['state'] = $user_info['state'];
        $me['mobile'] = $user_info['mobile'];
        $me['nick_name'] = $user_info['nick_name'];
        $me['user_name'] = $user_info['user_name'];
        $me['portrait'] = $user_info["portrait"];
        if(!empty($openid)){
            M("user")->where(['id'=>$me['id']])->save(['openid'=>$openid]);
        }
        session("bsme",$me); //保存登录状态
//        if($remember){
//            $auth_handle = new  OrgUserAuth();
//            $new_authkey = $auth_handle->updAuthKey($user_info['id'],OrgUserAuth::LOGIN_TYPE_PC);
//            cookie("bsvalidateidentify",$new_authkey,86400*7);//更新cookie验证token
//        }
    }
    /**读取学校职位 首页
     * @param $orgid
     * @return array
     */
    public static function get_job($orgid){
        $orgid = (int)$orgid;
        $list = M("jobs_job")->where("orgid = ".$orgid." and job_state in (2,3)")->order('id desc')->select();
        if(!empty($list)){
            foreach($list as &$val){
                $val['ordertime'] = substr($val['ordertime'],0,10);
                $val['createtime'] = substr($val['createtime'],0,10);
                $val['lastupdtime'] = substr($val['lastupdtime'],0,10);
                $val['experience'] = ParseConf('job_experience',$val['experience']);
                $val['edurecord'] = ParseConf('job_edurecord',$val['edurecord']);
//                $val['certflag'] = ParseConf('job_certflag',$val['certflag']);
//                $val['job_state'] = ParseConf('job_state',$val['job_state']);
                $jos_stat = self::get_job_stat($orgid,$val['id']);
                $val['newnum'] = isset($jos_stat['newnum']) && $jos_stat['newnum'] > 0 ?$jos_stat['newnum']:0;
                $val['waitnum'] = isset($jos_stat['waitnum']) && $jos_stat['waitnum'] > 0 ?$jos_stat['waitnum']:0;
                $val['unmatchnum'] = isset($jos_stat['unmatchnum']) && $jos_stat['unmatchnum'] > 0 ?$jos_stat['unmatchnum']:0;
                $val['sendmailnum'] = isset($jos_stat['sendmailnum']) && $jos_stat['sendmailnum'] > 0 ?$jos_stat['sendmailnum']:0;
            }
        }else{
            $list = [];
        }
        return $list;
    }

    /** 获取职位的统计数据
     * @param $orgid
     * @param $jobid
     * @return mixed
     */
    public static function get_job_stat(int $orgid,int $jobid){
        $orgid = (int)$orgid;
        $jobid = (int)$jobid;
        $redis = DistStorage::getRedisConn(101,1);
        $stat_key = 'BUSINESS:JOB:NUM:'.$orgid.':'.$jobid;
        if(!$redis->exists($stat_key)){
            $group = M('jobs_user_job_post')->field("count(*) as cnt,state")->where('state!=6 and jobid ='.$jobid)->group("state")->select();
            $newnum = $waitnum = $unmatchnum = $sendmailnum = 0;
            if($group){
                foreach($group as $g){
                    if($g['state'] == 0 || $g['state'] == 1 || $g['state'] == 2){
                        $newnum += $g['cnt'];
                    }else if($g['state'] == 3){
                        $waitnum += $g['cnt'];
                    }else if($g['state'] == 4){
                        $unmatchnum += $g['cnt'];
                    }else if($g['state'] == 5){
                        $sendmailnum += $g['cnt'];
                    }
                }
            }
            $redis->hIncrBy($stat_key,"newnum",$newnum);
            $redis->hIncrBy($stat_key,"waitnum",$waitnum);
            $redis->hIncrBy($stat_key,"unmatchnum",$unmatchnum);
            $redis->hIncrBy($stat_key,"sendmailnum",$sendmailnum);
        }
        $stat_data = $redis->hGetAll($stat_key);
        if(!isset($stat_data['newnum']) || $stat_data['newnum']<0){
            $stat_data['newnum'] = 0;
            $redis->hset($stat_key,"newnum",0);
        }
        if(!isset($stat_data['waitnum']) || $stat_data['waitnum']<0){
            $stat_data['waitnum'] = 0;
            $redis->hset($stat_key,"waitnum",0);
        }
        if(!isset($stat_data['unmatchnum']) || $stat_data['unmatchnum']<0){
            $stat_data['unmatchnum'] = 0;
            $redis->hset($stat_key,"unmatchnum",0);
        }
        if(!isset($stat_data['sendmailnum']) || $stat_data['sendmailnum']<0){
            $stat_data['sendmailnum'] = 0;
            $redis->hset($stat_key,"sendmailnum",0);
        }
        return $stat_data;
    }

    /** 填写完成审核信息
     * @param $me
     */
    public static function after_write_audit_info($me){
        $org_info = M("jobs_org")->where(['id'=>$me['id']])->find();
        $area = M("jobs_org_area")->where(['orgid'=>$me['id']])->order("id")->find();
        if ($area){
            M("jobs_org_area")->where(['orgid'=>$me['id']])->save(array(
                'provinceid' => $org_info['org_province'],
                'cityid' => $org_info['org_city'],
                'areaid' => $org_info['org_area'],
                'area_desc' => $org_info['org_areadesc'],
                'address' => $org_info['org_address'],
//                        'lng' => $data['org_lng'],
//                        'lat' => $data['org_lat'],
            ));
        }else{
            M("jobs_org_area")->add(array(
                'orgid' => $org_info['id'],
                'provinceid' => $org_info['org_province'],
                'cityid' => $org_info['org_city'],
                'areaid' => $org_info['org_area'],
                'area_desc' => $org_info['org_areadesc'],
                'address' => $org_info['org_address'],
                'lng' => $org_info['org_lng'],
                'lat' => $org_info['org_lat'],
                'create_time' => date("Y-m-d H:i:s"),
            ));
        }
        $interview_info = M("jobs_interview_info")->where(['orgid'=>$me['id']])->order("id")->find();
        if($interview_info){
            M("jobs_interview_info")->where(['orgid'=>$me['id']])->save(array(
                'linkman' => $org_info['org_linkman'],
                'phone' => $org_info['org_phone'],
                'address' => $org_info['org_areadesc'].' '.$org_info['org_address'],
            ));
        }else{
            M("jobs_interview_info")->add(array(
                'orgid' => $org_info['id'],
                'linkman' => $org_info['org_linkman'],
                'phone' => $org_info['org_phone'],
                'address' => $org_info['org_areadesc'].' '.$org_info['org_address'],
                'create_time' => date("Y-m-d H:i:s"),
            ));
        }
        $me['state'] = $org_info['state'];
        $me['org_name'] = $org_info['org_name'];
        session('bsme',$me);
    }

    /**修改职位后触发
     * @param $jobid
     * @param $state
     */
    public static function after_edit_job($jobid,$state){
        $jobid = (int)$jobid;
        $state = (int)$state;
        if($state == 2 || $state == 3){
            $job = M("jobs_job as j")->field('j.*,o.org_name as orgname,o.org_type as orgtype,o.short_name')
                ->join('jobs_org as o ON o.id = j.orgid')
                ->where("j.id = $jobid")->find();
            if($job){
                if($job['job_state'] == 2 || $job['job_state'] == 3 ){
                    $addjob = new Elasticsearch();
                    $addjob -> delJobById($jobid);
                    $addjob->addJob($job,$job['orgname'],$job['orgtype'],$job['short_name']);
                }
            }
        }

    }

    /** 新发布职位 写入搜索引擎
     * @param $jobid
     */
    public static function after_publish_job($jobid){
        $jobid = (int)$jobid;
        $job = M()->query("SELECT j.*,o.org_name AS orgname,o.org_type AS orgtype,o.short_name FROM jobs_job AS j INNER JOIN jobs_org AS o ON o.id = j.orgid WHERE j.id = $jobid");
        if($job){
            $job = $job[0];
            $addjob = new Elasticsearch();
            $addjob->addJob($job,$job['orgname'],$job['orgtype'],$job['short_name']);
        }
    }

    /** 按照状态统计职位数
     * @param $orgid
     * @param string $title
     * @return array
     */
    public static function stat_jobs($orgid,$title=''){
        $orgid = (int)$orgid;
        $where = " orgid = $orgid";
        if(!empty($title)){
            $title = addslashes($title);
            $where .= " AND title like '%$title%' ";
        }
        $data = M("jobs_job")->field("id,sum(case job_state when 2 then 1 when 3 then 1 else 0 end) zp,sum(case job_state when 1  then 1 else 0 end) wfb,sum(case job_state when 4  then 1 else 0 end) xj")->where($where)->group("orgid")->find();
        return !empty($data)?$data:[];
    }

    /**职位搜素
     * @param $orgid
     * @param int $state
     * @param string $title
     * @param bool $resume_stat 是都统计简历数据
     * @return array
     */
    public static function search_jobs($orgid,$state=2,$title='',$resume_stat=false){
        $orgid = (int)$orgid;
        $state = (int)$state;
        $where = " j.orgid = $orgid";
        if(!empty($title)){
            $title = addslashes($title);
            $where .= " AND j.title like '%$title%' ";
        }
        if($state == 2){
            $where .= " AND j.job_state in (2,3) ";
        }else{
            $where .= " AND j.job_state = $state ";
        }
        if($resume_stat){ //简历统计
            $data = M("jobs_job as j")->field('j.id,j.title,j.lastupdtime,j.ordertime,j.createtime,j.edurecord,j.experience,j.salary_min,j.salary_max,j.area_desc,count(p.id) as newnum')
                ->join('LEFT JOIN jobs_user_job_post as p ON p.jobid = j.id AND p.state = 0')
                ->where($where)
                ->group("j.id")
                ->order("j.lastupdtime desc")
                ->select();
        }else{
            $data = M("jobs_job as j")
                ->where($where)
                ->order("j.lastupdtime desc")
                ->select();
        }
        if(empty($data)){
            $data = [];
        }
        foreach($data as &$value){
            $value['ordertime'] = substr($value['ordertime'],0,10);
            $value['createtime'] = substr($value['createtime'],0,10);
            $value['lastupdtime'] = substr($value['lastupdtime'],0,10);
            $value['edurecord'] = ParseConf('job_edurecord',$value['edurecord']);
            $value['experience'] = ParseConf('job_experience',$value['experience']);
//            $value['certflag'] = ParseConf('job_certflag',$value['certflag']);
//            $value['job_state'] = ParseConf('job_state',$value['job_state']);
        }
        return $data;
    }

    /** 简历搜索
     * @param $orgid
     * @param int $type
     * @param null $jobid
     * @param int $certflag
     * @param int $edurecord
     * @param int $experience
     * @param int $age_min
     * @param int $age_max
     * @param int $page
     * @param int $limit
     * @return array
     */
    public static function search_resumes($orgid,$type=1,$jobid=null,$certflag=0,$edurecord=0,$experience=0,$age_min=0,$age_max=0,$page=1,$limit=20,$count=false){
        $orgid = (int)$orgid;
        $type = (int)$type;
        $page = (int)$page;
        if($page<1)$page=1;
        $limit = (int)$limit;
        if($limit<1)$limit=1;
        $jobid = (int)$jobid;
        $certflag = (int)$certflag;
        $edurecord = (int)$edurecord;
        $experience = (int)$experience;
        $age_min = (int)$age_min;
        $age_max = (int)$age_max;
        $link = [
            1 => ['state'=>'0,1,2','order'=>'p.id desc'],
            2 => ['state'=>'3','order'=>'p.updatetime desc,p.id desc'],
            3 => ['state'=>'5','order'=>'p.interview_time desc'],
            4 => ['state'=>'4','order'=>'p.updatetime desc,p.id desc'],
        ];
        if(isset($link[$type])){
            $type_info = $link[$type];
        }else{
            $type_info = $link[1];
            $type = 1;
            $order = $type_info['order'];
        }
        $state = $type_info['state'];
        $where = " p.orgid = $orgid ";
        if(!empty($jobid)){
            $where .= " and j.id = $jobid ";
        }
        if(!empty($certflag)){
            $where .= " and u.cert > 0 ";
        }
        if(!empty($edurecord)){
            $where .= " and u.edurecord >= $edurecord ";
        }
        if(!empty($experience)){
            $where .= " and u.experience >= $experience ";
        }
        if(!empty($age_min)){
            $min =  date('Y-00-00', strtotime(date("Y")-$age_min+1));
            $where .= " and u.birthday <= '".$min."' ";
        }
        if(!empty($age_max)){
            $max =  date('Y-00-00', strtotime(date("Y")-$age_min-1));
            $where .= " and u.birthday >= '".$max."' ";
        }
        $search_where = $where . " and p.state in ($state)";
        $data = M("jobs_user_job_post as p")
            ->field("u.`name`,u.userid,u.picture,p.state,u.edurecord,u.experience,u.birthday,p.posttime,j.title,p.id,p.updatetime,j.job_state,p.interview_time")
            ->join('jobs_user_info as u ON p.userid = u.userid')
            ->join('jobs_job as j ON p.jobid=j.id')
            ->where($search_where)
            ->order($order)
            ->page("$page , $limit")
            ->select();
        $cnt = 0;
        if(!empty($data)){
            $year = date("Y");
            foreach($data as &$val){
                $age = substr($val['birthday'],0,4);
                $val['birthday'] = abs($year-$age);
                $val['posttime'] = getShortTimeDesc($val['posttime']);
                $val['experience'] = ParseConf('user_experience',$val['experience']);
                $val['edurecord'] = ParseConf('user_edurecord',$val['edurecord']);
//                $val['state_desc'] = ParseConf('job_view_use_post_state',$val['state']);
                if(empty($val['picture'])){
                    $val['picture'] = "http://7xodvc.com2.z0.glb.qiniucdn.com/1468314907.png" ;
                }
            }
            if($count){
                $cnt = M("jobs_user_job_post as p")
                    ->join('jobs_user_info as u ON p.userid = u.userid')
                    ->join('jobs_job as j ON p.jobid=j.id')
                    ->where($search_where)
                    ->count();
            }
        }
        $result = [
            'data'=>$data?$data:[],
            'count'=>$cnt,
            'curr_page'=>$page,
            'page_count'=>ceil($cnt/$limit)
        ];
        unset($data);
        return $result;
    }

    /** 统计各个状态下职位数量
     * @param $orgid
     * @param null $jobid
     * @param int $certflag
     * @param int $edurecord
     * @param int $experience
     * @param int $age_min
     * @param int $age_max
     * @return array
     */
    public static function stat_resumes($orgid,$jobid=null,$certflag=0,$edurecord=0,$experience=0,$age_min=0,$age_max=0){
        $orgid = (int)$orgid;
        $jobid = (int)$jobid;
        $certflag = (int)$certflag;
        $edurecord = (int)$edurecord;
        $experience = (int)$experience;
        $age_min = (int)$age_min;
        $age_max = (int)$age_max;
        $where = " p.orgid = $orgid ";
        if(!empty($jobid)){
            $where .= " and j.id = $jobid ";
        }
        if(!empty($certflag)){
            $where .= " and u.cert > 0 ";
        }
        if(!empty($edurecord)){
            $where .= " and u.edurecord >= $edurecord ";
        }
        if(!empty($experience)){
            $where .= " and u.experience >= $experience ";
        }
        if(!empty($age_min)){
            $min =  date('Y-00-00', strtotime(date("Y")-$age_min+1));
            $where .= " and u.birthday <= '".$min."' ";
        }
        if(!empty($age_max)){
            $max =  date('Y-00-00', strtotime(date("Y")-$age_min-1));
            $where .= " and u.birthday >= '".$max."' ";
        }
        $group = M('jobs_user_job_post as p')->field("count(*) as cnt,state")
            ->join('jobs_user_info as u ON p.userid = u.userid')
            ->join('jobs_job as j ON p.jobid=j.id')
            ->where($where)->group("state")->select();
        $num = array(
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            'total'=>0
        );
        if($group){
            foreach($group as $g){
                $num['total'] += $g['cnt'];
                if($g['state'] == 0 || $g['state'] == 1 || $g['state'] == 2){
                    $num['1'] += $g['cnt'];
                }else if($g['state'] == 3){
                    $num['2'] += $g['cnt'];
                }else if($g['state'] == 4){
                    $num['4'] += $g['cnt'];
                }else if($g['state'] == 5){
                    $num['3'] += $g['cnt'];
                }
            }
        }
        return $num;
    }
}