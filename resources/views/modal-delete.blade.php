<div class="modal fade" id="delete-{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">
                  <i class="fas fa-exclamation-triangle"></i> &emsp;Eliminar Registro
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              ¿Estás seguro que quieres eliminarlo?
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              
              <form action="{{ route($route, $id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-primary">Si</button>
              </form>
              
          </div>
      </div>
  </div>
</div>
