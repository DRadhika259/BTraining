<?php
class Home extends Controller{
	protected function Index(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function IndexUpdate(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->IndexUpdate(), true);
	}
	
	protected function IndexDelete(){
		$viewmodel = new HomeModel();
		$this->returnView($viewmodel->IndexDelete(), true);
	}
	
}