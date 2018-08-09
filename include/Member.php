<?php
/**
 *changken會員系統專用函數庫
 *簡介:為促進程式開發人員方便開發，changken特別製作專用函數庫。
 *作者:changken
 *使用方式:請將函數直接複製即可。注意！一定要引入此函數庫，不然不能使用！
 *函數:reg()、login()、update()、delete_u()、logout()、getUserinfoBn()
 *版本:v1.3
 */

class Member
{
	/**
        * @var PDO PDO的實例
        */
	protected $db;

    /**
        * @var  Member Member實例
        * @deprecated
        */
    //protected static $instace = null;

    /**
        * singleton
        * @param mixed $args
        * @return Member
        * @deprecated 已有容器
        */
    /*public static function instance(... $args)
    {
        if(static::$instace == null)
        {
            static::$instace = new Member(... $args);
        }

        return static::$instace;
    }*/

    /**
        * Member的建構子
        *
        * @param DBconnect $connect 選擇資料庫
        * @return void
        */
	public function __construct(DBconnect $connect)
	{
	    $this->db = $connect->getConnect();
	}

	/**
        * 註冊函數
        *
        * @param array $request  輸入的資料
        * @return int
        */
	public function reg(array $request)
	{
		//判斷
		if ($request['username'] == null) //使用者名稱為空
		{
			$return = 0;
		} 
		elseif ($request['password'] == null) //密碼為空
		{
			$return = 1;
		} 
		elseif ($request['password2'] == null) //密碼(再試一次)為空
		{
			$return = 2;
		} 
		elseif ($request['$password'] != $request['password2']) //兩次密碼不一致
		{
			$return = 3;
		} 
		else {
			//sql語法
			$reg_sql = "INSERT INTO `user` (`username`, `email`, `password`, `level`) VALUES (:username, :email, :password_md5, :level);";
			$reg = $this->db->prepare($reg_sql);

			//過濾資料
			$reg->bindParam(":username", $request['username'], PDO::PARAM_STR);
			$reg->bindParam(":email", $request['email'], PDO::PARAM_STR);
			$reg->bindParam(":password_md5", md5($request['password']), PDO::PARAM_STR);
			$reg->bindParam(":level", $request['level'], PDO::PARAM_STR);

			//執行
			if ($reg->execute()) 
			{
				$return = 4;
			} 
			else 
			{
				$return = 5;
			}
		}

		return $return;
	}
	
	/**
        * 登入函數
        *
        * @param array $request 輸入的資料
        * @return int
        */
	public function login(array $request)
	{

		//sql語法
		$login_sql = "SELECT * FROM `user` WHERE `username`=:username AND `password`=:password_md5;";
		$login = $this->db->prepare($login_sql);

		//過濾資料
		$login->bindParam(":username", $request['username'], PDO::PARAM_STR);
		$login->bindParam(":password_md5", md5($request['password']), PDO::PARAM_STR);

		//執行
		$login->execute();

		//從資料庫撈取資料(1筆)
		$login_row = $login->fetch(PDO::FETCH_ASSOC);

		//一連串的判斷
		if ($request['username'] == null) //使用者名稱為空
		{
			$return = 0;
		} 
		elseif ($request['password'] == null) //密碼為空
		{
			$return = 1;
		} 
		elseif ($request['username'] != $login_row['username'] || md5($request['password']) != $login_row['password']) //使用者名稱或密碼錯誤
		{
			$return = 2;
		} 
		else 
		{
			if ($login_row['level'] == "user") //權限user
			{
				$return = 3;
			} 
			elseif ($login_row['level'] == "admin") //權限admin
			{
				$return = 4;
			} 
			else 
			{
				$return = 5;
			}
		}

		return $return;
	}
	
	/**
        * 更新帳號資訊函數
        *
        * @param array $request 輸入的資料
        * @return int
        */
	function update(array $request)
	{

		//sql語法
		$update_sql = "UPDATE `user` SET `email` = :email, `password` = :password_md5, `level` = :level WHERE `username` = :username;";
		$update = $this->db->prepare($update_sql);

		//過濾資料
		$update->bindParam(":email", $request['email'], PDO::PARAM_STR);
		$update->bindParam(":password_md5", $request['password'], PDO::PARAM_STR);
		$update->bindParam(":level", $request['level'], PDO::PARAM_STR);
		$update->bindParam(":username", $request['username'], PDO::PARAM_STR);

		//執行
		if ($update->execute()) 
		{
			$return = 0;
		} 
		else 
		{
			$return = 1;
		}

		return $return;
	}
	
	/**
        * 刪除會員函數
        *
        * @param string $username 用戶名
        * @return int
        */
	function delete_u(string $username)
	{
		$row = $this->getUserinfoBn($username);

		if($username == null) //使用者名稱為空
		{
			$return = 0;
		}
		else if(!isset($row['username'])) //使用者不存在
		{
			$return = 1;
		}
		else
		{
		    //sql語法
            $delete_sql = "DELETE FROM user WHERE username = :username;";
            $delete_u = $this->db->prepare($delete_sql);
			
            //過濾資料
            $delete_u->bindParam(":username", $username, PDO::PARAM_STR);
			
            if ($delete_u->execute())
            {
                $return = 2;
            }
            else
            {
                $return = 3;
            }
		}

		return $return;
	}
	
	/**
        * 取得使用者資訊函數
        *
        * @param string $username 用戶名
        * @return array 用戶的個人資料
        */
	public function getUserinfoBn(string $username)
	{
		//sql語法
		$getuser_sql = "SELECT * FROM `user` WHERE `username`= :username;";
		$getuser = $this->db->prepare($getuser_sql);
		
		//過濾資料
		$getuser->bindParam(":username", $username, PDO::PARAM_STR);
		
		//執行
		$getuser->execute();
		
		//取得使用者資訊(1筆)
		return $getuser->fetch(PDO::FETCH_ASSOC);
	}
}
