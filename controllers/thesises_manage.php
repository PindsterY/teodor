<?php

/**
 * Created by PhpStorm.
 * User: carolin
 * Date: 28.01.15
 * Time: 9:50
 */
class thesises_manage extends Controller
{
    function index()
    {
        $this->departments = get_all("SELECT * FROM departments");
    }

    function view()
    {
        $department_id = $this->params[1];
        $this->selected_department = get_first("SELECT * FROM departments WHERE department_id='{$department_id}'");
        $this->departments = get_all("SELECT * FROM departments");
        $this->admins = get_all("SELECT * FROM thesis_admins JOIN persons using (person_id) WHERE thesis_admins.department_id='{$department_id}'");
        $this->persons = get_all("SELECT * FROM persons");

    }

    function add_admin()
    {
        insert('thesis_admins', $_GET);
        exit('Ok');
    }

    function delete_admin() {
        $person_id = $_GET['person_id'];
        if(is_array($person_id)) {
            $person_id = implode(",", $person_id);
        }
        $department_id = $_GET['department_id'];
        q("delete from thesis_admins WHERE person_id IN ({$person_id}) AND department_id={$department_id}");
        exit('Ok');
    }

}




