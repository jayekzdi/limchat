<?php
include '../db.php';
session_start();

function loadDepartments($connect){
    $sql='SELECT * from emp_dept';
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'.
        '<td>'.$row["dept_name"].'</td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td> <button type="button" class="btn btn-default btn-sm pull-right" data-toggle="modal" data-target="#user-edit">
        <i class="fas fa-user-edit"></i>
        </button>
        <?php include "modals/edit_account.php";?>
        </td>'.
        '<td><button class="btn btn-danger btn-sm remove-dept">
        <i class="fas fa-trash"></i></button></td>'.
        '</tr>';
    }

}

function LoadGender($connect){
    $sql="select * from emp_gender";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row["gender_id"].'">'.$row["gender"].'</option>';
    }
}

function loadDepartmentsOption($connect){
    $sql='SELECT * from emp_dept';
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row["dept_id"].'">'.$row["dept_name"].'</option>';
    }
}
function LoadSecurityQuestion($connect){
    $sql="select * from emp_security_question";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result)){
        echo '<option value="'.$row["sq_id"].'">'.$row["sq_question"].'</option>';
    }
}

function loadAnnoucements($connect){
    $sql='SELECT * from announcements where ann_status=1';
    $result=mysqli_query($connect,$sql);
    $out='';
    while($row=mysqli_fetch_array($result)){
        $out.= '<tr>'.
        '<td>'.$row["ann_title"].'</td>'.
        '<td>'.$row["ann_date"].'</td>';
        if(strlen($row["ann_announcement"])<25){
        $out.='<td>'.$row["ann_announcement"].'</td>';
        }
        else{
            $out.='<td>'.substr($row["ann_announcement"],0,25).'...</td>';
        }
       $out.= '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td></td>'.
        '<td> <button type="button" class="btn btn-default btn-sm pull-right view-ann" id="'.$row["ann_id"].'" >
        <i class="fas fa-eye"></i>
        </button>
        </td>'.
        '<td><button class="btn btn-danger btn-sm remove-ann" id="'.$row["ann_id"].'" data-toggle="modal" data-target="#ann_remove">
        <i class="fas fa-trash"></i></button></td>'.
        '</tr>';
    }
    echo $out;

}
?>