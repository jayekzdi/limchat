<?php
include '../../db.php';
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
?>