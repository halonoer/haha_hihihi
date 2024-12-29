<?php

class unit
{
    //grup ruangan function lookup======================================================================================================
    function get_data_unit_for_lookup_unit_search($search_keyword, $limit_start, $limit, $link)
    {

        $sql = "SELECT department_id,department_name FROM department WHERE ACTIVE_FLAG = 'Y' 
                    and department_name like '$search_keyword' 
                    ORDER BY department_name asc LIMIT $limit_start,$limit";

        return $sql;
    }

    function get_data_unit_for_lookup_unit_all($limit_start, $limit, $link)
    {

        $sql = "SELECT department_id,department_name FROM department WHERE ACTIVE_FLAG = 'Y' 
                    ORDER BY department_name asc LIMIT $limit_start,$limit";

        return $sql;
    }

    function get_Total_data_unit_for_lookup_unit_search($search_keyword, $link)
    {

        $sql = "select count(department_id) as jumlah
                    FROM department WHERE ACTIVE_FLAG = 'Y' and department_name like '$search_keyword'";

        return $sql;
    }

    function get_Total_data_unit_for_lookup_unit_all($link)
    {

        $sql = "select count(department_id) as jumlah
                    FROM department ";

        return $sql;
    }

    function getdata_unit_name($unit_id, $link)
    {

        $query = "select DEPARTMENT_ID, DEPARTMENT_CODE, DEPARTMENT_NAME, PROGRAM_CODE, KATA, ACTIVE_FLAG
                        from department where DEPARTMENT_ID = $unit_id";

        $cmd = mysql_query($query, $link);
        $hasil = mysql_fetch_assoc($cmd);

        return $hasil['DEPARTMENT_NAME'];
    }
    function getdata_unit_mb()
    {
        $query = "select DEPARTMENT_ID, DEPARTMENT_CODE, DEPARTMENT_NAME, PROGRAM_CODE, KATA, ACTIVE_FLAG
                        from department where DEPARTMENT_ID in (18,28)";

        return $query;
    }
}
?>