<?php
class Produits extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_Produits');
		$this->load->model('model_Client');
		$this->load->library('form_validation');
	}

	function index()
	{
		$this->load->view('vue_Produits');
	}

	function donne_produit()
	{
		$data = $this->model_Produits->liste_Produits();
		echo json_encode($data);
	}

	function enregistrer()
	{
		$this->form_validation->set_rules('nom_produit', 'nom_produit', 'callback_alpha_dash_espace');
		$this->form_validation->set_rules('prix_produit', 'prix_produit', 'required|numeric');
		$this->form_validation->set_rules('email_achat', 'email_achat', 'valid_email');
		$this->form_validation->set_rules('description_produit', 'description_produit', 'xss_clean|callback_alpha_dash_espace');


		if ($this->form_validation->run())
		{
			$data = $this->model_Produits->enregistrer_Produit();
			echo json_encode($data);
		}
		else{ echo 9;}
	}

	function alpha_dash_espace($string)
	{
		if ( ! preg_match('/^[0-9\pL _-éà!ôçë*&?#@:()]+$/u',$string))
		{
			return false;
		}
	}

	function mettreAJour()
	{
		$this->form_validation->set_rules('nom_produit', 'nom_produit', 'callback_alpha_dash_espace');
		$this->form_validation->set_rules('prix_produit', 'prix_produit', 'required|numeric');
		$this->form_validation->set_rules('email_achat', 'email_achat', 'valid_email');
		$this->form_validation->set_rules('description_produit', 'description_produit', 'xss_clean|callback_alpha_dash_espace');
		if ($this->form_validation->run())
		{
			$data = $this->model_Produits->update_Produit();
			echo json_encode($data);
		}
		else{ echo 9;}
	}

	function supprimer()
	{
		$data = $this->model_Produits->supprimer_Produit();
		echo json_encode($data);
	}

	function enregistrer_Achat()
	{
		$this->form_validation->set_rules('nom', 'nom', 'required|alpha');
		$this->form_validation->set_rules('email', 'email', 'valid_email');
		if ($this->form_validation->run())
		{
			$dbclient = new model_Client();
			$data = $dbclient->enregistrer_Client();
			echo json_encode($data);
		}
	}
}
