<!-- Modal de Delete-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">	
	<div class="modal-dialog" role="document">
		<div class="modal-content">	 
			<div class="modal-header">	
				<h4 class="modal-title" id="modalLabel">Excluir Família</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Fechar">				
					
					<span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					Deseja realmente excluir esta família?
				</div>
				<div class="modal-footer">
					<a id="confirm" class="btn btn-primary" href="<?php echo BASEURL; ?>view/deletefam.php?id=<?php echo $familia['id']; ?>">Sim</a>	        <a id="cancel" class="btn btn-default" data-dismiss="modal">N&atilde;o</a>	
				</div>
			</div>	
		</div>
	</div>
 <!-- /.modal -->