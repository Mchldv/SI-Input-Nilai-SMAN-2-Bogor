
<!--p>list semua mata pelajaran, kalo diklik</p-->
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <a class="waves-effect waves-light btn" href="<?php echo base_url();?>penilaian/input">Tambah Mata Pelajaran</a>
    <table>
        <thead>
          <tr>
              <th data-field="id">Mata Pelajaran</th>
              <th data-field="id">Kelas</th>
              <th data-field="id">Tahun Ajaran</th>
              <th data-field="id">Edit Mata Pelajaran</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Matematika</td>
            <td>XII</td>
            <td>2015/2016</td>
            <td><button class="modal-trigger" href="#editmatpel">Edit</button></td>
          </tr>
          <tr>
            <td>Ekonomi</td>
            <td>X</td>
            <td>2015/2016</td>
            <td><button class="modal-trigger" href="#editmatpel">Edit</button></td>
          </tr>
          <tr>
            <td>Fisika</td>
            <td>XI</td>
            <td>2015/2016</td>
            <td><button class="modal-trigger" href="#editmatpel">Edit</button></td>
          </tr>
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