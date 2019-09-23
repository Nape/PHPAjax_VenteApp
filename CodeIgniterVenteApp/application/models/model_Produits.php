<?php
class model_Produits extends CI_Model
{
	function liste_Produits()
	{
		$listeProduit = $this->db->get('produit');
		return $listeProduit->result();
	}

	function enregistrer_Produit()
	{


		$data = array(
			'nom_produit' => $this->input->post('nom_produit'),
			'prix_produit' => $this->input->post('prix_produit'),
			'devise' => $this->input->post('devise'),
			'email_achat' => $this->input->post('email_achat'),
			'description_produit' => $this->input->post('description_produit'),
			'image_produit' => $this->convertirImage(),
			'mode_payment' => $this->input->post('mode_payment'),

		);
		$result = $this->db->insert('produit', $data);
		return $result;
	}

	function convertirImage()
	{
		$pathImage = "";
		/* Getting file name */
		$filename = $_FILES['image_produit']['name'];

		/* Location */
		$location = "assets/image/".$filename;
		$uploadOk = 1;
		$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

//		/* Valid Extensions */
//		$valid_extensions = array("jpg","jpeg","png");
//		/* Check file extension */
//		if( !in_array(strtolower($imageFileType),$valid_extensions) )
//		{
//			$uploadOk = 0;
//		}
//
//		if($uploadOk == 0)
//		{
//			echo 0;
//		}
//		else{
			/* Upload file */
			if(move_uploaded_file($_FILES['image_produit']['tmp_name'],$location))
			{
				$pathImage = $location;
			}

		return $pathImage;

	}

	function update_Produit()
	{
		$id_produit = $this->input->post('id');
		$nom_produit = $this->input->post('nom_produit');
		$prix_produit = $this->input->post('prix_produit');
		$devise = $this->input->post('devise');
		$email_achat = $this->input->post('email_achat');
		$description_produit = $this->input->post('description_produit');
//		$image_produit = $this->input->post('image_produit');
		$mode_payment = $this->input->post('mode_payment');

		$this->db->set('nom_produit', $nom_produit);
		$this->db->set('prix_produit', $prix_produit);
		$this->db->set('devise', $devise);
		$this->db->set('email_achat', $email_achat);
		$this->db->set('description_produit', $description_produit);
//		$this->db->set('image_produit', $image_produit);
		$this->db->set('mode_payment', $mode_payment);

		$this->db->where('id', $id_produit);

		$result = $this->db->update('produit');

		return $result;
	}

	function supprimer_Produit()
	{
		$id_produit = $this->input->post('id');
		$this->db->where('id', $id_produit);
		$result = $this->db->delete('produit');
		return $result;
	}

}
