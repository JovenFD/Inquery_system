<?php
    class ControllerLogin extends Model {

        public function getLogin($data) {
            $newPass = md5($data['password']);

            $sql = "SELECT * FROM tbl_user WHERE username=:username AND password=:password LIMIT 01";

            $arrayParam = [
                'username' => $data['username'],
                'password' => $newPass
            ];

            $result = $this->runQuery(
                $sql, 
                $arrayParam, 
                0
            );

            if(!$result) {
                return array(
                    'message' => 'Invalid Username & Password',
                    'status'  => 'warning'
                );
                die();
            }

            return array(
                'message' => $result,
                'status'  => 'success'
            );
        }

        public function createUser($data) {
            $newPass = md5($data['password']);

            $sql = "INSERT INTO tbl_user (`fname`, `lname`, `username`, `password`, `email`, `dob`, `gender`, `usertype`, `u_avatar`) VALUES (:fname, :lname, :username, :password, :email, :dob, :gender, :usertype, :u_avatar)";

            $arrayParam = [
                'fname'    => $data['fname'],
                'lname'    => $data['lname'],
                'username' => $data['username'],
                'password' => $newPass,
                'email'    => $data['email'],
                'dob'      => $data['dob'],
                'gender'   => $data['gender'],
                'usertype' => 1,
                'u_avatar' => 'avatar.png'
            ];

            $this->runQuery(
                $sql, 
                $arrayParam, 
                1
            );

            return array(
                'message' => 'Register Account Successfully.',
                'status'  => 'success'
            );
        }


        public function updateUser($data, $file, $sessionData) {

            $newPass = md5($data['cpass']);

            $avtQuery = $file == 4 ? '' : ", u_avatar=:u_avatar";

            $arrayParam  = $file == 4 ? 
            [
                'fname'    => $data['fname'],
                'lname'    => $data['lname'],
                'username' => $data['username'],
                'password' => $newPass,
                'email'    => $data['email'],
                'dob'      => $data['dob'],
                'gender'   => $data['gender'],
                'usertype' => $sessionData['usertype'],
                'user_id' => $sessionData['user_id']
            ]
            : 
            [
                'fname'    => $data['fname'],
                'lname'    => $data['lname'],
                'username' => $data['username'],
                'password' => $newPass,
                'email'    => $data['email'],
                'dob'      => $data['dob'],
                'gender'   => $data['gender'],
                'usertype' => $sessionData['usertype'],
                'u_avatar' => $file,
                'user_id' => $sessionData['user_id']
            ];

            $sql = "UPDATE tbl_user SET fname=:fname, lname=:lname, username=:username, password=:password, email=:email, dob=:dob, gender=:gender, usertype=:usertype".$avtQuery." WHERE user_id=:user_id";

            $this->runQuery(
                $sql, 
                $arrayParam, 
                1
            );

            return array(
                'message' => 'Update Account Successfully.',
                'status'  => 'success'
            );
        }

        public function getProfile($id) {
            $sql = "SELECT * FROM tbl_user WHERE user_id=:user_id LIMIT 01";
            $arrayParam =[
                'user_id' => $id
            ];

            return $this->runQuery(
                $sql, 
                $arrayParam, 
                0
            );
        }
    }
