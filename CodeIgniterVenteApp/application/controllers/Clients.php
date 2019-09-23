<?php
class Clients extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_Client');
	}

	function enregistrer_Achat()
	{
		$data = $this->model_Client->enregistrer_Client();
		echo json_encode($data);
	}
}
