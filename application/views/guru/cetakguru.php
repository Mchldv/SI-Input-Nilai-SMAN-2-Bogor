<div class="container">
    <h1>Daftar Guru</h1>
    <?php echo validation_errors(); ?>
    <button class="modal-trigger" href="#tambahguru">Tambah Guru</button>
    <table>
        <thead>
          <tr>
              <th data-field="id">NIK</th>
              <th data-field="id">Nama Lengkap</th>
              <th data-field="price">Edit Data Guru</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach ($guru as $object)
        { ?>
          <tr>
            <td><?php echo $object->nik; ?></td>
            <td><?php echo $object->nama; ?></td>
            <td><button class="modal-trigger" href="#editguru">Edit</button></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
</div>

<div id="tambahguru" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>guru/verifikasi_tambah" method="post">
                      <div class="input-field col s12">
                         <input name="nik" type="text" class="validate" placeholder="NIK" required>
                         <label>NIK</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" placeholder="Nama Lengkap" required>
                         <label>Nama Lengkap</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">UBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>

<div id="editguru" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>guru/verifikasi_guru" method="post">
                      <div class="input-field col s12">
                         <input name="nik" type="text" class="validate" value="69217319371" required>
                         <label>NIK</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" value="Cemewew Kintil" required>
                         <label>Nama Lengkap</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">UBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>
<script>
    	  $(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal-trigger').leanModal();
        complete: function() { alert('Closed'); } 
	  });
</script>