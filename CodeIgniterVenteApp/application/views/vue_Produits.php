<!DOCTYPE html>
<html class="">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Liste de produits</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-modal-shake.css'?>">
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap-modal-shake.js'?>"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Include the PayPal JavaScript SDK -->
	<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="col-md-12" style="margin-top: 5%">
				<h1>Liste des produits
					<div class="float-right"><a href="javascript:void(0);" class=" btn-info btn btn-lg " data-toggle="modal" data-target="#Modal_Ajouter"><span class="fa fa-plus"></span> Ajouter un produit</a></div>
				</h1>
			</div>

			<table class="table table-striped" id="table_produits" name="table_produits">
				<thead>
				<tr>
					<th>ID</th>
					<th>Nom du produit</th>
					<th>Prix</th>
					<th style="text-align: right; padding-right: 16%;">Action</th>
				</tr>
				</thead>
				<tbody id="afficher_table">

				</tbody>
			</table>
		</div>
	</div>

</div>

<!-- PAGE MODAL AJOUTER -->
<form>
	<div class="modal fade" id="Modal_Ajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ajouter un produit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label class="col-form-label">Nom du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<input type="text" name="nom_produit" id="nom_produit" class="form-control">
						</div>
					</div>
					<label class=" col-form-label">Prix du produit</label>
					<div class="form-group row">
						<div class="col-md-6">
							<input type="number" name="prix_produit" id="prix_produit" class="form-control" >
						</div>
						<div class="col-md-4">
							<select id="devise" name="devise" class="form-control">
								<option value="USD" selected>USD</option>
								<option value="CAD">CAD</option>
							</select>
						</div>
					</div>
					<label class="col-form-label">Image du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<input type="file" class="form-control" id="image_produit" id="image_produit">
						</div>
					</div>
					<label class="col-form-label">Description du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<textarea id="description_produit" name="description_produit" class="form-control"></textarea>
						</div>
					</div>

					<label class="col-form-label">Email commerçant</label>
					<div class="form-group row">
						<div class="col-md-10">
							<input type="email" id="email_achat" name="email_achat" class="form-control"/>
						</div>
					</div>

					<label class="col-form-label">Mode de payment</label>
					<div class="form-group row">
						<div class="col-md-10">
							<select id="mode_payment" name="mode_payment" class="form-control">
								<option value="PAYPAL" selected>Paypal</option>
								<option value="CREDIT">Crédit</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
					<button type="button" type="submit" id="btn_enregistrer" class="btn btn-primary">Enregistrer</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- FIN PAGE MODAL AJOUTER-->

<!-- PAGE MODAL MODIFIER -->
<form id="fmodif" name="fmodif">
	<div class="modal fade" id="Modal_Modifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modifier Produit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label class="col-form-label">ID du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<input type="text" name="id_modif" id="id_modif" class="form-control" readonly >
						</div>
					</div>
					<label class="col-form-label">Nom du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<input type="text" name="nom_produit_modif" id="nom_produit_modif" class="form-control" >
						</div>
					</div>
					<label class=" col-form-label">Prix du produit</label>
					<div class="form-group row">
						<div class="col-md-6">
							<input type="text" name="prix_produit_modif" id="prix_produit_modif" class="form-control" >
						</div>
						<div class="col-md-4">
							<select id="devise_modif" name="devise_modif" class="form-control">
								<option value="USD" selected>USD</option>
								<option value="CAD">CAD</option>
							</select>
						</div>
					</div>
					<label class="col-form-label">Image du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<img id="image_produit_modif" src="" class="img-thumbnail">
						</div>
					</div>
					<label class="col-form-label">Description du produit</label>
					<div class="form-group row">
						<div class="col-md-10">
							<textarea id="description_produit_modif" name="description_produit_modif" class="form-control"></textarea>
						</div>
					</div>

					<label class="col-form-label">Email commerçant</label>
					<div class="form-group row">
						<div class="col-md-10">
							<input type="email" id="email_achat_modif" name="email_achat_modif" class="form-control"/>
						</div>
					</div>

					<label class="col-form-label">Mode de payment</label>
					<div class="form-group row">
						<div class="col-md-10">
							<select id="mode_payment_modif" name="mode_payment_modif" class="form-control">
								<option value="PAYPAL" selected>Paypal</option>
								<option value="CREDIT">Crédit</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
					<button type="button" type="submit" id="btn_update" class="btn btn-primary btn-danger">Modifier</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--FIN MODAL MODIFIER-->

<!--PAGE MODAL SUPPRIMER-->
<form>
	<div class="modal fade" id="Modal_Supprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Supprimer Produit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<strong>Etes-vous sur de vouloir supprimer ce produit définitivement ?</strong>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_produit_supprimer" id="id_produit_supprimer" class="form-control">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
					<button type="button" type="submit" id="btn_supprimer" class="btn btn-primary btn-danger">Oui</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- FIN PAGE MODAL SUPPRIMER-->

<!--PAGE MODAL ACHETER PRODUIT-->
<form>
	<div class="modal fade" id="Modal_Achat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Achat produit</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
						<label class="col-form-label" id="id_produit_achat" name="id_produit_achat"> </label>
						<label class="col-form-label" id="nom_produit_achat" name="nom_produit_achat"> </label>
						<div class="form-group row">
							<div class="col-md-4">
								<img id="image_produit_achat" src="" class="img-thumbnail">
							</div>
							<div class="col-md-8">
								<textarea id="description_produit_achat" name="description_produit_acaht" class="form-control" readonly style="height: 100%;resize: none;"></textarea>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_produit_achat" id="id_produit_achat" class="form-control">
					<input type="hidden" name="prix_produit_achat" id="prix_produit_achat" class="form-control">
					<input type="hidden" name="devise_produit_achat" id="devise_produit_achat" class="form-control">

					<input type="text" id="nom_utilisateur_achat" name="nom_utilisateur_achat" class="form-control" placeholder="Nom d'utilisateur"/>
					<input type="email" id="email_utilisateur_achat" name="email_utilisateur_achat" class="form-control" placeholder="Email"/>
					<!-- Container Paypal -->
					<div id="paypal-button-container"></div>
					<button type="button" type="submit" id="btn_Achat" class="btn btn-success">Acheter</button>

				</div>
			</div>
		</div>
	</div>
</form>
<!--FIN PAGE MODAL ACHETER PRODUIT-->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.4.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        afficherProduit();

        function afficherProduit()
		{
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Produits/donne_produit')?>',
                async: true,
                dataType: 'json',
                success: function (data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].id + '</td>' +
                            '<td>' + data[i].nom_produit + '</td>' +
                            '<td>' + data[i].prix_produit + '/' + data[i].devise + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" style="color: white" data-idproduit="' + data[i].id + '" data-nomproduit="' + data[i].nom_produit + '" data-prixproduit="' + data[i].prix_produit + '"data-devise="' + data[i].devise + '"data-emailproduit="' + data[i].email_achat + '"data-descriptionproduit="' + data[i].description_produit + '"data-imageproduit="' + data[i].image_produit + '"data-modepayment="' + data[i].mode_payment + '">Modifier</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-danger btn-md item_delete" data-idProduit="' + data[i].id + '">Supprimer</a>' + ' ' +
                            '<a href="javascript:void(0);" class="btn btn-success btn-lg item_achat" data-idproduit="' + data[i].id + '" data-nomproduit="' + data[i].nom_produit + '" data-prixproduit="' + data[i].prix_produit + '"data-devise="' + data[i].devise + '"data-emailproduit="' + data[i].email_achat + '"data-descriptionproduit="' + data[i].description_produit + '"data-imageproduit="' + data[i].image_produit + '"data-modepayment="' + data[i].mode_payment + '">Achat</a>' +
                            '</td>' +
                            '</tr>';
                    }
                    $('#afficher_table').html(html);
                }
            });
        }

        //Enregistrer Produits
        $('#btn_enregistrer').on('click', function () {
            var nom_produit = $('#nom_produit').val();
            var prix_produit = $('#prix_produit').val();
            var devise = $('#devise').val();
            var email_achat = $('#email_achat').val();
            var description_produit = $('#description_produit').val();
            var image_produit = $("#image_produit")[0].files[0];
            var mode_payment = $('#mode_payment').val();

            //Utilisation de FormData pour transmetre des images/fichiers
            var formData = new FormData();
            formData.append('nom_produit', nom_produit);
            formData.append('prix_produit', prix_produit);
            formData.append('devise', devise);
            formData.append('email_achat', email_achat);
            formData.append('description_produit', description_produit);
            formData.append('image_produit', image_produit);
            formData.append('mode_payment', mode_payment);


            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Produits/enregistrer')?>",
                // dataType : "JSON",
                type: 'post',

                contentType: false,
                processData: false,
                data: formData,
                success: function (data)
				{
				    if (data==9)
					{
                        swal("Erreur", "Certains de vos champs contiennent des caractères prescrits", "error");
					}
				    else
				        {
                        $('[name="nom_produit"]').val("");
                        $('[name="prix_produit"]').val("");
                        $('[name="devise"]').val("");
                        $('[name="email_achat"]').val("");
                        $('[name="description_produit"]').val("");
                        $('[name="image_produit"]').val("");
                        $('[name="mode_payment"]').val("");
                        $('#Modal_Ajouter').modal('hide');
                        swal("Produit ajouté !", "Votre produit à été ajouté avec succes", "success");
                        afficherProduit();
                    }
                },
                error: function (data)
                {

                    swal("Erreur", "Certains de vos champs contiennent des caractères prescrits", "error");
                }
            });
            return false;
        });

        //Récuperer les donnée du produit pour modification à partir de data <a editItem>.
        $('#afficher_table').on('click', '.item_edit', function () {
            var id = $(this).data('idproduit');
            var nom_produit = $(this).data('nomproduit');
            var prix_produit = $(this).data('prixproduit');
            var devise = $(this).data('devise');
            var email_achat = $(this).data('emailproduit');
            var description_produit = $(this).data('descriptionproduit');
            var image_produit = $(this).data('imageproduit');
            var mode_payment = $(this).data('modepayment');

            $('#Modal_Modifier').modal('show');
            $('[name="id_modif"]').val(id);
            $('[name="nom_produit_modif"]').val(nom_produit);
            $('[name="prix_produit_modif"]').val(prix_produit);
            $('[name="devise_modif"]').val(devise);
            $('[name="email_achat_modif"]').val(email_achat);
            $('[name="description_produit_modif"]').val(description_produit);
            $("#image_produit_modif").attr('src', image_produit);
            $('[name="mode_payment_modif"]').val(mode_payment);

        });

        //Mise a jour du produit dans la base de donnée
        $('#btn_update').on('click', function () {
            var id = $('#id_modif').val();
            var nom_produit = $('#nom_produit_modif').val();
            var prix_produit = $('#prix_produit_modif').val();
            var devise = $('#devise_modif').val();
            var email_achat = $('#email_achat_modif').val();
            var description_produit = $('#description_produit_modif').val();
            var mode_payment = $('#mode_payment_modif').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Produits/mettreAJour')?>",
                // dataType: "JSON",
                data:
                    {
                        id: id,
                        nom_produit: nom_produit,
                        prix_produit: prix_produit,
                        devise: devise,
                        email_achat: email_achat,
                        description_produit: description_produit,
                        mode_payment: mode_payment
                    },
                success: function (data)
				{
                    if (data==9)
                    {
                        swal("Erreur", "Certains de vos champs contiennent des caractères prescrits", "error");
                    }
                    else {

                        $('[name="id_modif"]').val("");
                        $('[name="nom_produit_modif"]').val("");
                        $('[name="prix_produit_modif"]').val("");
                        $('[name="devise_modif"]').val("");
                        $('[name="email_achat_modif"]').val("");
                        $('[name="description_produit_modif"]').val("");
                        $('[name="image_produit_modif"]').val("");
                        $('[name="mode_payment_modif"]').val("");
                        $('#Modal_Modifier').modal('hide');
                        swal("Produit modifié !", "Votre produit à été modifié avec succes", "success");
                        afficherProduit();
                    }
                },
                error: function (data)
				{
                    swal("Erreur", "Certains de vos champs contiennent des caractères prescrit", "error");
                }
            });
            return false;
        });

        //Obtenir l'id du produit pour la suppression.
        $('#afficher_table').on('click', '.item_delete', function () {
            var id = $(this).data('idproduit');

            $('#Modal_Supprimer').modal('show');
            $('[name="id_produit_supprimer"]').val(id);
        });

        //Evoie requete pour la suppression du produit à la base de données.
        $('#btn_supprimer').on('click', function () {
            var id = $('#id_produit_supprimer').val();
            $.ajax(
                {
                    type: "POST",
                    url: "<?php echo site_url('Produits/supprimer')?>",
                    dataType: "JSON",
                    data:
                        {
                            id: id
                        },
                    success: function (data) {
                        $('[name="id_produit_supprimer"]').val("");
                        $('#Modal_Supprimer').modal('hide');
                        afficherProduit();
                    }
                });
            return false;
        });

        //Récuperer les donnée du produit pour achat à partir de data.
        $('#afficher_table').on('click', '.item_achat', function () {
            var id = $(this).data('idproduit');
            var nom_produit = $(this).data('nomproduit');
            var prix_produit = $(this).data('prixproduit');
            var devise = $(this).data('devise');
            var email_achat = $(this).data('emailproduit');
            var description_produit = $(this).data('descriptionproduit');
            var image_produit = $(this).data('imageproduit');
            var mode_payment = $(this).data('modepayment');

            $('#Modal_Achat').modal('show');
            $('[name="nom_produit_achat"]').html("Produit : " + nom_produit);
            $('#description_produit_achat').val(description_produit);
            $("#image_produit_achat").attr('src', image_produit);
            //CACHÉ
            $("#devise_produit_achat").val(devise);
            $("#prix_produit_achat").val(prix_produit);
            $("#id_produit_achat").val(id);

        });
        //Evoie requete pour l'achat du produit.
        $('#btn_Achat').on('click', function ()
		{
            var id_produit = $('#id_produit_achat').val();
            var nom_utilisateur = $('#nom_utilisateur_achat').val();
            var email_utilisateur = $('#email_utilisateur_achat').val();
			
            $.ajax(
                {
                    type: "POST",
                    url: "<?php echo site_url('Produits/enregistrer_Achat')?>",
                    dataType: "JSON",
                    data:
                        {
                            id_produit:id_produit,
							nom:nom_utilisateur,
							email:email_utilisateur
                        },
                    success: function (data)
					{
					    alert('Ventes conclue !');
                        $('#Modal_Achat').modal('hide');
                        $.ajax(
                            {
                                type: "POST",
                                url: "<?php echo site_url('Produits/supprimer')?>",
                                dataType: "JSON",
                                data:
                                    {
                                        id: id_produit
                                    },
                                success: function (data)
								{
                                    swal("Vente réussi !", "Le produit sera retiré de l'inventaire", "success");
                                    afficherProduit();
                                }
                            });
                    }
                    ,
                    error: function (data)
                    {
                        swal("Erreur", "Veuiller entrer un nom d'utilisateur et courriel valide.", "error");
                    }
                });
            return false;
        });

		// PAYPAL====================================
        paypal.Buttons({
            // Set up the transaction
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01',
                        }
                    }]
                });
            },
            onApprove: function (data, actions)
			{
                return actions.order.capture().then(function (details)
				{
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }


        }).render('#paypal-button-container');

    });

</script>
</body>
</html>
