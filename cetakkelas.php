<!--p>12 ipa sekian sama ada list nama setelah di klik kelasnya dan juga ada tahun kelas ajaran</p-->
<div class="container">
    <h1>Daftar Kelas</h1>
    <a class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/input">Tambah Kelas</a>
    <table>
        <thead>
          <tr>
              <th data-field="id">Tingkat</th>
              <th data-field="id">Jurusan</th>
              <th data-field="id">Nomor Kelas</th>
              <th data-field="id">Tahun Ajaran</th>
              <th data-field="id">Wali Kelas</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($kelas as $row) { ?>
          <tr>
            <td><?php echo $row->tingkat; ?></td>
            <td><?php echo $row->jurusan; ?></td>
            <td><?php echo $row->nomor_kelas; ?></td>
            <td><?php echo $row->tahun_ajar; ?></td>
            <td><?php echo $row->wali_kelas; ?></td>
            <td><button class="modal-trigger" href="#loginmodal">Detil</button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
</div>
<div id="loginmodal" class="modal">
    <div class="modal-content">
      <div class="row">
        kunyuk <!-- HAHAHAHAHAHA INI APAAN KAMPRET -->
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