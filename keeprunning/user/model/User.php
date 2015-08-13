<?php
/**
 * Created by PhpStorm.
 * User: yong
 * Date: 14/12/24
 * Time: 下午11:29
 */

class User {
    private $id;
    private $u_id;
    private $nickname;   //昵称
    private $password;   //密码
    private $phone;      //邮箱
    private $avatar;     //头像
    private $deviceToken;//设备token
    private $token;      //token
    private $birthday;   //生日
    private $weight;     //体重
    private $height;     //身高
    private $sex;        //性别
    private $goal;       //目标

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $deviceToken
     */
    public function setDeviceToken($deviceToken)
    {
        $this->deviceToken = $deviceToken;
    }

    /**
     * @return mixed
     */
    public function getDeviceToken()
    {
        return $this->deviceToken;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $u_id
     */
    public function setUId($u_id)
    {
        $this->u_id = $u_id;
    }

    /**
     * @return mixed
     */
    public function getUId()
    {
        return $this->u_id;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $goal
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    }

    /**
     * @return mixed
     */
    public function getGoal()
    {
        return $this->goal;
    }


} 