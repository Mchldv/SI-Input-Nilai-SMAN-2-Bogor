<!--p>12 ipa sekian sama ada list nama setelah di klik kelasnya dan juga ada tahun kelas ajaran</p-->
<div class="container">
    <h1>Daftar Kelas</h1>
    <?php if ($duplicate_error == true) { ?>
      <h3>ERROR COX</h3>
    <?php } ?>
    <button class="modal-trigger" href="#tambahkelas">Tambah Kelas</button>
    <table>
        <thead>
          <tr>
              <th data-field="id">NIK Wali Kelas</th>
              <th data-field="id">Wali Kelas</th>
              <th data-field="id">Kelas</th>
              <th data-field="id">Tahun Ajaran</th>
              <th data-field="price">Edit Kelas</th>
          </tr>
        </thead>

        <tbody>
        <?php foreach ($kelas as $object)
        { ?>
          <tr>
            <td><?php echo $object->nik_wali_kelas; ?></td>
            <td><?php echo $object->wali_kelas; ?></td>
            <td><?php echo $object->tingkat . ' ' . $object->jurusan . ' ' . $object->nomor_kelas; ?></td>
            <td><?php echo $object->tahun_ajar; ?></td>
            <td><button class="modal-trigger" href="#loginmodal">Edit</button></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
</div>

<div id="tambahkelas" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>kelas/verifikasi_tambah" method="post">
<<<<<<< HEAD
=======
                      <div class="input-field col s12">
                         <input name="nik_wali" type="text" class="validate">
                         <label>NIK Wali</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="name" type="text" class="validate">
                         <label>Nama Siswa</label>
                      </div>
>>>>>>> 404e20f3bb63b17b64f87161c15d146eb3e9ca98
                      <div class="input-field col s2">
                          <span>Tingkat</span>
                          <select name="tingkat" class="browser-default">
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                          </select>
                      </div>
                      <div class="input-field col s3">
                          <span>Jurusan</span>
                          <select name="jurusan" class="browser-default">
                            <option>IPA</option>
                            <option>IPS</option>
                          </select>
                      </div>
                      <div class="input-field col s3">
                          <input name="nomor_kelas" type="text" class="validate">
                          <label>Nomor Kelas</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="tahun_ajar" type="text" class="validate">
                         <label>Tahun Ajar</label>
                      </div>
                      <div class="input-field col s12">
                          <span>Wali Kelas</span>
                          <select name="nik_wali" class="browser-default">
                          <?php foreach ($guru as $row)
                          { ?>
                            <option value="<?php echo $row->nik; ?>"><?php echo $row->nama; ?></option>
                          <?php } ?>
                          </select>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">TAMBAH</button>
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>

<div id="loginmodal" class="modal">
    <div class="modal-content">
      <div class="row">
        <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>kelas/verifikasi_kelas" method="post">
                      <div class="input-field col s12">
                         <input name="nik_wali" type="text" class="validate" value="2138173912">
                         <label>NIK Wali</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="nisn" type="text" class="validate" value="2138173912">
                         <label>NISN</label>
                      </div>
                      <div class="input-field col s12" >
                         <input name="nama" type="text" class="validate" value="aselole ngaceng">
                         <label>Nama Siswa</label>
                      </div>
                      <div class="input-field col s2">
                          <span>Tingkat</span>
                          <select name="bank" class="browser-default">
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                          </select>
                      </div>
                      <div class="input-field col s3">
                          <span>Jurusan</span>
                          <select name="bank" class="browser-default">
                            <option>IPA</option>
                            <option>IPS</option>
                          </select>
                      </div>
                      <div class="input-field col s3">
                          <span>Nomor Kelas</span>
                          <select name="bank" class="browser-default">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                          </select>
                      </div>
                      <div class="input-field col s12">
                         <input name="tahun" type="text" class="validate" value="2015/2016">
                         <label>Tahun Ajar</label>
                      </div>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">EDIT</button>
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