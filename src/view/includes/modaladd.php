<!-- Modal -->
     <div class="modal fade" id="AddFamModal" tabindex="-1" role="dialog" aria-labelledby="AddFamModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="AddFamModalTitle">Adicionar Família</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="add.php" method="post">
              <div class="form-group">
                <label for="formGroupExampleInput">Nome</label>
                <input type="text" class="form-control" id="AddNomeFamília" placeholder="Nome da Família">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput2">Qunatidade de Membros</label>
                <input type="number" class="form-control" id="AddQtdMembros">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Enviar</button>
              </div>
            </form>
          </div>        
        </div>
      </div>
    </div>