<?php 
class Shares extends Controller{
    protected function Index(){
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->Index(),true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location:'.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->add(), true);
    } 


    protected function IndexUpdate(){
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->IndexUpdate(),true);
    }
    protected function update(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location:'.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->update(), true);
    } 


    protected function IndexDelete(){
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->IndexDelete(),true);
    }
    protected function delete(){
        if(!isset($_SESSION['is_logged_in'])){
            header('Location:'.ROOT_URL.'shares');
        }
        $viewmodel = new ShareModel();
        $this->returnView($viewmodel->delete(), true);
    } 
}