<?php
namespace App\Models;

class UserModel extends Model
{
    function __construct()
    {
        $this->table = 'users';
        parent::__construct();
    }

    public function create_user($user_data) {
        return $this->setQuery("INSERT INTO {$this->table}(username, email, password, birthday, phone_number, url) 
                                VALUES (?, ?, ?, ?, ?, ?)
                                ")
                    ->execute([
                            $user_data['username'],
                            $user_data['email'],
                            $user_data['password'],
                            $user_data['birthday'],
                            $user_data['phone_number'],
                            $user_data['url']
                        ]);
    }

    public function get_user_detail_by_username($username) {
        return $this->setquery("select * from {$this->table} where username = ?")
                    ->loadRow([$username]);
    }

    public function get_all_user()
    {
        return $this->setquery("select * from {$this->table}")
                    ->loadAllRow();
    }

    public function delete_user($username) {
        return $this->setQuery("DELETE FROM {$this->table} WHERE username = ?")
                    ->execute([$username]);
    }
}