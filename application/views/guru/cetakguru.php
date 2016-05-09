<div class="container">
    <h1>Daftar Guru</h1>
    <button class="modal-trigger" href="#tambahguru">Tambah Siswa</button>
    <table>
        <thead>
          <tr>
              <th data-field="id">NIK</th>
              <th data-field="id">Nama Lengkap</th>
              <th data-field="price">Edit Data Guru</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>69217319371</td>
            <td>Nanik Sucipto</td>
            <td><button class="modal-trigger" href="#editguru">Edit</button></td>
          </tr>
          <tr>
            <td>69217319371</td>
            <td>Similikiti Haribut</td>
            <td><button class="modal-trigger" href="#editguru">Edit</button></td>
          </tr>
          <tr>
            <td>69217319371</td>
            <td>Cemewew Kintil</td>
            <td><button class="modal-trigger" href="#editguru">Edit</button></td>
          </tr>
        </tbody>
      </table>
</div>

<div id="tambahguru" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nik" type="text" class="validate" placeholder="69217319371">
                         <label>NIK</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" placeholder="Cemewew Kintil">
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
            <form class="col s12" action="" method="post">
                      <div class="input-field col s12">
                         <input name="nik" type="text" class="validate" value="69217319371">
                         <label>NIK</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" value="Cemewew Kintil">
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