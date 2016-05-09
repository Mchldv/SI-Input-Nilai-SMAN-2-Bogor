<div class="container">
    <h1>Daftar Guru</h1>
    <a class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/input">Tambah Guru</a>
    <table>
        <thead>
          <tr>
              <th data-field="id">Nama Lengkap</th>
              <th data-field="id">NUPTK</th>
              <th data-field="id">NIK</th>
              <th data-field="id">NIP</th>
              <th data-field="price">Pendidikan Terakhir</th>
              <th data-field="price">Detil Lain</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($guru as $item) { ?>
          <tr>
            <td><?php echo $item->nama; ?></td>
            <td>69217319371</td>
            <td><?php echo $item->nik; ?></td>
            <td>199201910210</td>
            <td>S1</td>
            <td><button class="modal-trigger" href="#loginmodal">Detil</button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
</div>

<div id="loginmodal" class="modal">
    <div class="modal-content">
      <div class="row">
          <p>halo</p>
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