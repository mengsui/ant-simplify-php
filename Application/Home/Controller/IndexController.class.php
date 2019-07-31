<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    // 注册接口
    public function register(){
        $module = M('personal');
        // 参数接收
        $integration['user_name'] = $_POST['user_name'];
        $integration['mobile'] = $_POST['mobile'];
        $integration['email'] = $_POST['email'];
        $integration['password'] = $_POST['password'];

        // 参数返回错误提示
        $res['code'] = -1;
        $res['errMeg'] = '请输入用户名称';
        !$integration['user_name'] ? $this->ajaxReturn($res) :'';
        $res['errMeg'] = '请输入手机号';
        !$integration['mobile'] ? $this->ajaxReturn($res) :'';
        $res['errMeg'] = '请输入密码';
        !$integration['password'] ? $this->ajaxReturn($res) :'';

        // 查询
        $seleCondition['user_name'] = $integration['user_name'];
        $countNub = $module->where($seleCondition)->count();

        // 判断是否保存了改账号
        if($countNub <= 0){
            $module->add($integration);
            $res['code'] = 1;
            $res['errMeg'] = '数据保存成功！';
            $res['data'] = '数据保存成功！';
        } else {
            $res['errMeg'] = '数据保存失败！';
            $res['data'] = '已有“'.$integration['user_name'].'”的账号';
        }

        $this->ajaxReturn($res);
    }

    // 登录接口
    public function login(){
        $module = M('personal');

        $res['code'] = -1;
        $res['errMeg'] = "无该账号";

        // 获取改用户数据
        $seleCondition['user_name'] = $_POST['user_name'];
        $password = $_POST['password'];
        $countNub = $module->where($seleCondition)->count();
        
        // 有该账号
        if($countNub > 0){
            $module->where($seleCondition)->find();
            $user_data = $module->data();

            if($user_data['password'] == $password){
                $res['code'] = 1;
                $res['errMeg'] = "登录成功！";
            } else {
                $res['code'] = -1;
                $res['errMeg'] = "密码错误！";
            }
        }

        $this->ajaxReturn($res);
    }

    public function userDetails(){
        $module = M('personal');

        $res['code'] = -1;
        $res['errMeg'] = "无该账号";

        // 获取用户数据
        $seleCondition['user_name'] = $_GET['user_name'];
        $countNub = $module->where($seleCondition)->count();

        // 有该账号
        if($countNub > 0){
            $module->where($seleCondition)->find();
            $res['code'] = 1;
            $res['errMeg'] = "获取成功！";
            $res['user_info'] = $module->data();
        }

        $this->ajaxReturn($res);
    }
}