  <div class="modal fade" id="modal-edit<?=$data->Id_rencanajudul; ?>" tabindex="-1" role="dialog"      labelledby="myModalLabel"
              >
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">PILIH </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="post" action="<?= base_url('dosen/rencana_judul/updateRencanajudul') ?>" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                   
                      <div class="md-form mb-5">
                        <td><label for="">Id</label></td>
                        <input type="text" name="Id_rencanajudul" id="form3" class="form-control" value="<?= $data->Id_rencanajudul; ?>">
                        
                      </div>
                      <div class="md-form mb-5">
                         
                        <select class="form-control" name="Status">
                        	<option value="1"><b>Diproses</b></option>
                        	<option value="2"><b>Diterima</b></option>
                        	<option value="3"><b>Ditolak</b></option>
                        </select>
                      </div>
                  
                    </div>
                   
                    <div class="modal-footer d-flex justify-content-center">
                       <button type="button" class="btn btn-default" data-dismiss="modal">TUTUP</button>
                      <button class="btn btn-primary">PILIH<i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
         
       