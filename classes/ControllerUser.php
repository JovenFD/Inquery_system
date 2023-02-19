<?php
class ControllerUser extends Model
{

    public function getSelectIndexPosition($id)
    {
        $sql = "SELECT * FROM tbl_post pst 
        LEFT JOIN tbl_postions pt ON pt.positions_id = pst.postions_id
        LEFT JOIN tbl_branches bch ON bch.branches_id = pst.branches_id WHERE bch.branches_id=$id ORDER BY pst.post_id DESC";

        return $this->runQuery(
            $sql,
            false,
            3
        );
    }
}