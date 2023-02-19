<?php
class ControllerAdmin extends Model
{
    public function indexUsers()
    {

        $sql = "SELECT * FROM tbl_user WHERE usertype=2 ORDER BY user_id DESC";

        return $this->runQuery(
            $sql,
            false,
            3
        );
    }

    public function indexBranches()
    {

        $sql = "SELECT * FROM tbl_branches ORDER BY branches_id DESC";

        return $this->runQuery(
            $sql,
            false,
            3
        );
    }

    public function indexPosition()
    {

        $sql = "SELECT * FROM tbl_postions ORDER BY positions_id DESC";

        return $this->runQuery(
            $sql,
            false,
            3
        );
    }

    public function indexPost()
    {

        $sql = "SELECT * FROM tbl_post pst 
        LEFT JOIN tbl_postions pt ON pt.positions_id = pst.postions_id
        LEFT JOIN tbl_branches bch ON bch.branches_id = pst.branches_id ORDER BY pst.post_id";

        return $this->runQuery(
            $sql,
            false,
            3
        );
    }

    public function getIndex($id, $id_name, $tbl_name)
    {
        $sql = "SELECT * FROM $tbl_name WHERE $id_name=:id";

        $arrayParam = [
            'id' => $id
        ];

        return $this->runQuery(
            $sql,
            $arrayParam,
            0
        );
    }


    public function getIndexPostTable($id)
    {
        $sql = "SELECT * FROM tbl_post pst 
        LEFT JOIN tbl_postions pt ON pt.positions_id = pst.postions_id
        LEFT JOIN tbl_branches bch ON bch.branches_id = pst.branches_id WHERE pst.post_id=:id";

        $arrayParam = [
            'id' => $id
        ];

        return $this->runQuery(
            $sql,
            $arrayParam,
            0
        );
    }

    public function destroy($id, $id_name, $tbl_name)
    {

        $sql = "DELETE FROM $tbl_name WHERE $id_name=:id";

        $arrayParam = [
            'id' => $id
        ];

        if ($this->runQuery(
            $sql,
            $arrayParam,
            1
        )) {
            return $this->createMsg('destroy');
        }
    }

    public function createBranches($param)
    {

        $sql = "INSERT INTO `tbl_branches` (`branches_name`) VALUES (:branches_name)";

        $arrayParam = [
            'branches_name' => $param['bname']
        ];

        $this->runQuery(
            $sql,
            $arrayParam,
            1
        );

        return $this->createMsg('create');
    }

    public function createPositions($param)
    {

        $sql = "INSERT INTO `tbl_postions` (`position_name`) VALUES (:position_name)";

        $arrayParam = [
            'position_name' => $param['pname']
        ];

        $this->runQuery(
            $sql,
            $arrayParam,
            1
        );

        return $this->createMsg('create');
    }

    public function createPost($param)
    {
        $arrayParam = [
            'branches_id'      => $param['branches'],
            'postions_id'      => $param['jobposition'],
            'expect_salary'    => $param['expect_salary'],
            'salary_type'      => $param['salary_type'],
            'p_email'          => $param['email'],
            'p_address'        => $param['address'],
            'job_descriptions' => $param['description'],
            'ks_needed'        => $param['skills_need'],
            'post_id'          => $param['id_post'],
        ];

        if (isset($param['id_post'])
        ) {

            $sql = "UPDATE `tbl_post` SET `branches_id`=:branches_id, `postions_id`=:postions_id, `job_descriptions`=:job_descriptions, `expect_salary`=:expect_salary, `salary_type`=:salary_type, `ks_needed`=:ks_needed, `p_address`=:p_address, `p_email`=:p_email WHERE `post_id`=:post_id";

            $msg = 'update';
        } 
        
        if (empty($param['id_post'])
        ) {
            $sql = "INSERT INTO `tbl_post` (`branches_id`, `postions_id`, `job_descriptions`, `expect_salary`, `salary_type`, `ks_needed`, `p_address`, `p_email`) VALUES (:branches_id, :postions_id, :job_descriptions, :expect_salary, :salary_type, :ks_needed, :p_address, :p_email)";

            unset($arrayParam['post_id']);

            $msg = 'post';
        }

        $this->runQuery(
            $sql,
            $arrayParam,
            1
        );

        return $this->createMsg($msg);
    }

    public function createUser($data, $file)
    {
        
        $newPass = md5($data['cpass']);

        if ($file == '4') {
            $newfile = 'avatar.png';
        } else {
            $newfile = $file;
        }

        $arrayParam = [
            'fname'    => $data['fname'],
            'lname'    => $data['lname'],
            'username' => $data['username'],
            'password' => $newPass,
            'email'    => $data['email'],
            'dob'      => 'No Dob',
            'gender'   => 'No Gender',
            'usertype' => 2,
            'u_avatar' => $newfile,
            'user_id' => $data['user_id']
        ];

        if (!empty($data['user_id'])
        ) {

            $avtQuery = $file == 4
                ? ''
                : ", u_avatar=:u_avatar";

            if ($file == 4) {
                unset($arrayParam['u_avatar']);
            }

            $sql = "UPDATE tbl_user SET fname=:fname, lname=:lname, username=:username, password=:password, email=:email, dob=:dob, gender=:gender, usertype=:usertype" . $avtQuery . " WHERE user_id=:user_id";

            $msg = 'update';
        }

        if (empty($data['user_id'])
        ) {
            unset($arrayParam['user_id']);

            $sql = "INSERT INTO tbl_user (`fname`, `lname`, `username`, `password`, `email`, `dob`, `gender`, `usertype`, `u_avatar`) VALUE (:fname, :lname, :username, :password, :email, :dob, :gender, :usertype, :u_avatar)";

            $msg = 'create';
        }

        $this->runQuery(
            $sql,
            $arrayParam,
            1
        );

        return $this->createMsg($msg);
    }

    public function createMsg($param)
    {
        switch ($param) {
            case 'create':
                return array(
                    'message' => 'Create new data successfully.',
                    'status'  => 'success'
                );
                break;
            case 'update':
                return array(
                    'message' => 'Update data successfully.',
                    'status'  => 'success'
                );
                break;
            case 'destroy':
                return array(
                    'message' => 'Remove data successfully.',
                    'status'  => 'success'
                );
                break;
            case 'post':
                return array(
                    'message' => 'Post data successfully.',
                    'status'  => 'success'
                );
                break;
        }
    }
}