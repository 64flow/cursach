<?php
class MySQL
{
    private $link;

    public function Connect($host, $user, $password, $name)
    {
        $this->link = mysqli_connect($host, $user, $password, $name);
        if ($this->link)
        {
            mysqli_set_charset($this->link, "utf8");
        }
        else echo "Can't connect the database<br>".mysqli_connect_error();

        return $this->link;
    }

    public function Select($sql)
    {
        $result = mysqli_query($this->link, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $result;
    }

    public function Execute($sql)
    {
        $result = mysqli_query($this->link, $sql);
        return $result;
    }

    public function ExecuteMany($sqls){
        $query = '';

        foreach ($sqls as $sql)
        {
            $query .= $sql.';';
        }
        $result = mysqli_multi_query($this->link, $query);
        return $result;
    }
}
?>