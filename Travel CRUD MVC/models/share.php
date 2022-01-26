<?php
class ShareModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM tourist');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){
			if($post['name'] == '' || $post['place'] == '' || $post['email'] == '' || $post['phno'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}

            //Insert into MySQL
            $this->query('INSERT INTO tourist(name, place, email, phno, user_id) VALUES (:name, :place, :email, :phno, :user_id)');
            $this->bind(':name',$post['name']);
            $this->bind(':place',$post['place']);
            $this->bind(':email',$post['email']);
            $this->bind(':phno',$post['phno']);
            $this->bind(':user_id', 1);
			$this->execute();

            //Verify
            if($this->lastInsertId()){
                //Redirect
                header('Location: '.ROOT_URL.'shares');
            }
        }
        return;
    }

    public function IndexUpdate(){
        $this->query('SELECT * FROM tourist WHERE id='.$id);
        $rows = $this->resultSet();
        return $rows;
    }

    public function update(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['submit']){
        //update
            $this->query("UPDATE tourist SET name = '".$name."', place='".$place."', email='".$email."', phno='".$phno."', user_id= $user_id, WHERE id =" .$id);
            $this->execute();

            //Verify
            if($this->lastInsertId()){
                //Redirect
                header('Location: '.ROOT_URL.'shares');
            }
        }
        return;
}


public function IndexDelete(){
    $this->query('SELECT * FROM tourist WHERE id='.$id);
    $rows = $this->resultSet();
    return $rows;
}

public function delete(){
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if($post['id']){
    //update
        $this->query("DELETE FROM tourist WHERE id=".$id);
        $this->execute();

        //Verify
        if($this->lastInsertId()){
            //Redirect
            header('Location: '.ROOT_URL.'shares');
        }
    }
    return;
}
}