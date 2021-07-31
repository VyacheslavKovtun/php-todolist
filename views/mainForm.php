<form method="POST">
    <div class="modal fade" id="modalFormAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">ToDo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <input type="text" name="task_text" class="form-control validate">
              <label data-error="wrong" data-success="right">Задача</label>
            </div>
            <div class="md-form mb-4">
              <input type="text" name="task_status_id" class="form-control validate">
              <label data-error="wrong" data-success="right">Статус id (1-3)</label>
            </div>
            <div class="md-form mb-4">
              <input type="text" name="priority_id" class="form-control validate">
              <label data-error="wrong" data-success="right">Приоритет id (1-3)</label>
            </div>
            <div class="md-form mb-4">
              <input type="date" name="complete_date" class="form-control validate">
              <label data-error="wrong" data-success="right">Дата выполнения</label>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-outline-primary waves-effect">
          </div>
        </div>
      </div>
    </div>
</form>