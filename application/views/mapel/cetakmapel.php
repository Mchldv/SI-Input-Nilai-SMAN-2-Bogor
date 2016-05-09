
<!--p>list semua mata pelajaran, kalo diklik</p-->
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <button class="modal-trigger" href="#inputmapel">Tambah Mata pelajaran</button>
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
<div id="inputmapel" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" placeholder="MTK231801">
                         <label>Kode Mata Pelajaran</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nis" type="text" class="validate" placeholder="Matematika">
                         <label>Mata Pelajaran</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" placeholder="12">
                         <label>Kelas</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="kelas" type="text" class="validate" placeholder="2016/2017">
                         <label>Tahun Ajaran</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">TAMBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>
<div id="editmatpel" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" value="MTK231801">
                         <label>Kode Mata Pelajaran</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nis" type="text" class="validate" value="Matematika">
                         <label>Mata Pelajaran</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" value="12">
                         <label>Kelas</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="kelas" type="text" class="validate" value="2016/2017">
                         <label>Tahun Ajaran</label>
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