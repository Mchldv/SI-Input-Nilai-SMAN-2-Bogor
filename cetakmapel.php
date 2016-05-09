
<!--p>list semua mata pelajaran, kalo diklik</p-->
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <a class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/input">Tambah Mata Pelajaran</a>
    <table>
        <thead>
          <tr>
              <th data-field="id">Kode</th>
              <th data-field="id">Nama</th>
              <th data-field="id">Edit Mata Pelajaran</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($mapel as $row) { ?>
          <tr>
            <td><?php echo $row->kode_mapel; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><button class="modal-trigger" href="#editmatpel">Edit</button></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
</div>
<div id="editmatpel" class="modal">
    <div class="modal-content">
      <div class="row">
        kunyuk
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