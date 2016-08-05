<!--p>12 ipa sekian sama ada list nama setelah di klik kelasnya dan juga ada tahun kelas ajaran</p-->
<div class="container">
    <h1>Daftar Kelas</h1>
    <?php if ($duplicate_error == true) { ?>
      <h3>ERROR COX</h3>
    <?php } ?>
    <button class="modal-trigger waves-effect waves-light btn" href="#tambahkelas">Tambah Kelas</button>
    <table>
        <thead>
          <tr>
              <th data-field="id">NIK Wali Kelas</th>
              <th data-field="id">Wali Kelas</th>
              <th data-field="id">Kelas</th>
              <th data-field="id">Tahun Ajaran</th>
              <th data-field="price">Edit Kelas</th>
              <th data-field="price">Hapus Kelas</th>
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
            <td><a class="waves-effect waves-light btn" href="<?php echo base_url();?>kelas/edit/<?php echo $object->nik_wali_kelas;?>">Edit</a></td>
            <td><a href="#" class="waves-effect waves-light btn">Hapus</a></td>
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
                      <div class="input-field col s12">
                         <input name="nik_wali" type="text" class="validate">
                         <label>NIK Wali</label>
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
        <div class="row">
         <div class="col s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>kelas/verifikasi_tambah" method="post">
                      <div class="input-field col s12">
                         <input name="nik_wali" type="text" class="validate">
                         <label>NIK Wali</label>
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
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">TAMBAH</button>
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