<?php
class model_Client extends CI_Model
{
	function enregistrer_Client()
	{

		$data = array(
			'id_produit' => $this->input->post('id_produit'),
			'nom' => $this->input->post('nom'),
			'email' => $this->input->post('email')
		);
		$result = $this->db->insert('client_details', $data);
		return $result;
	}
}
