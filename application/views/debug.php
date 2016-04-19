          <?php foreach($produk->result() as $row){ ?>
          <div class="col s9 panel-divider">               
               <div class="card-panel lighten-2 title-panel">
                 <h5><i class="material-icons">shopping_basket<sup>settings</sup></i><br>Edit Produk</h5>
               </div>
               
               <div class="card-panel lighten-2">
                    <h5>Gambar Produk</h5>
                    <p>Masukkan gambar produk minimal satu foto. Gunakan 5 foto terbaik untuk gambar produk Anda.</p>
                    <div class="row">
                    <div class="col s2" style="display:none">
                             <form  id="produks" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/1" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/1/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                        <div class="col s2">
                             <form  id="produk1" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/1" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/1/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                        <div class="col s2">
                             <form  id="produk2" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/2" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/2/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                        <div class="col s2">
                             <form  id="produk3" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/3" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/3/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                        <div class="col s2">
                             <form  id="produk4" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/4" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/4/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                        <div class="col s2">
                             <form  id="produk5" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/5" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/5/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                        <div class="col s2">
                             <form  id="produk6" action="<?php echo base_url();?>AdminDistro/gambar_produk_upload/<?php echo $row->id_produk;?>/6" class="dropzone"  >
                             <div class="dz-message" data-dz-message><span><div style="background-image:url('http://seveid.com/assets/gambar_kaos/xsmall/6/<?php echo $row->id_produk;?>.jpg'); width:55px; height:50px; background-size:cover; background-position:center;"></div></span></div>
                             </form>
                        </div>
                    </div>
               </div>
               <div class="card-panel lighten-2">
                    <h5>Detail Produk</h5>
                    <form action="<?php echo base_url();?>AdminDistro/tambah_produk_submit" method="post">
                         <div class="row">
                              <div class="input-field col s6">
                                   <input name="nama_produk" id="nama_produk" type="text" class="validate" value="<?php echo $row->nama_produk;?>">
                                   <label for="nama_produk">Nama Produk</label>
                              </div>
                               <div class="input-field col s6">
                                   <input name="harga" id="harga" type="text" class="validate" value="<?php echo $row->harga;?>">
                                   <label for="harga">Harga</label>
                              </div>
                         </div>
                         <div class="row">
                         	<div class="input-field col s6">                         
				    <select name="kategori">
				      <optgroup label="FASHION">
				      <?php foreach ($kategori->result() as $raw){?> 
				        <option value="<?php echo $raw->id_kategori;?>"><?php echo $raw->nama_kategori;?></option>
				        <?php }?>
				      </optgroup>
				    </select>
				    <label>Pilih Kategori</label>
				    </div>
                               <div class="input-field col s6">
                                   <input name="berat" id="berat" type="text" class="validate" value="<?php echo $row->berat; ?>">
                                   <label for="berat">Berat</label>
                              </div>
                         </div>
                         <div class="row">
                              <div class="input-field col s12">
                                   <textarea name="deskripsi_produk" id="deskripsi_produk" class="materialize-textarea"><?php echo $row->deskripsi_produk;?></textarea>
                                   <label for="deskripsi_produk">Deskripsi Produk</label>
                              </div>
                         </div>
                         <div class="row">
                              <div class="input-field col s6">
                         	 <select class="icons" name="penyimpanan">
				      <option value="" disabled selected>Tambahkan ke</option>
				      <option <?php if($row->penyimpanan=='0') echo "selected";?> value="0" data-icon="<?php echo base_url();?>assets/Icon/house34.png" >Etalase</option>
				      <option <?php if($row->penyimpanan=='1') echo "selected";?> value="1" data-icon="<?php echo base_url();?>assets/Icon/factories1.png">Gudang</option>
				    </select>
				    </div>
			         <div class="input-field col s6">
                                   <input name="ukurancm" id="ukurancm" type="text" class="validate" value="<?php echo $row->deskripsi_ukuran; ?>">
                                   <label for="ukurancm">Detail Ukuran (Panjang, lebar, lingkar, dll)</label>
                              </div>
                         </div>
                         <div class="row">
                         <div class="input-field col s12">
							 <p>Jumlah per Ukuran</p>
							 </div>
                              <div class="input-field col s2">
                                   <input name="s" id="s" type="text" class="validate" value="<?php echo $row->s;?>">
                                   <label for="s">S</label>
                              </div>
                              <div class="input-field col s2">
                                   <input name="m" id="m" type="text" class="validate" value="<?php echo $row->m;?>">
                                   <label for="m">M</label>
                              </div>
                              <div class="input-field col s2">
                                   <input name="l" id="l" type="text" class="validate" value="<?php echo $row->l;?>">
                                   <label for="l">L</label>
                              </div>
                              <div class="input-field col s2">
                                   <input name="xl" id="xl" type="text" class="validate" value="<?php echo $row->xl;?>">
                                   <label for="xl">XL</label>
                              </div>
                              <div class="input-field col s2">
                                   <input name="xxl" id="xxl" type="text" class="validate" value="<?php echo $row->xxl;?>">
                                   <label for="xxl">XXL</label>
                              </div>
                         </div>
                         
                         <div class="row">
                              <div class="col s12">
                                   <button type="submit" class="waves-effect waves-light btn grey darken-1" style="width:100%; margin-top:20px;">Simpan</button>
                              </div>
                             
                         </div>
                    </form>
               </div>
         </div>
     </div>
</div>
<?php }?>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    // or disable for specific dropzone:
    // Dropzone.options.myDropzone = false;
    
    Dropzone.options.myDropzone = {
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      acceptedFiles: ".jpg"
    }; 
    $(function() {
      // Now that the DOM is fully loaded, create the dropzone, and setup the
      // event listeners

    var produk1= new Dropzone("#produk1");
    produk1.on("error", function(file) {
        Materialize.toast('Failed to upload file!', 5000, 'rounded');
    })
    
    produk1.on("success", function(file) {
     Materialize.toast('Be patient your image still processing!', 5000, 'rounded');
    });


/////////////////////////////////

    var produk2= new Dropzone("#produk2");
    produk2.on("error", function(file) {
        Materialize.toast('Failed to upload file!', 5000, 'rounded');
    })
    
    produk2.on("success", function(file) {
     Materialize.toast('Be patient your image still processing!', 5000, 'rounded');
    });

/////////////////////////////////

    var produk3= new Dropzone("#produk3");
    produk3.on("error", function(file) {
        Materialize.toast('Failed to upload file!', 5000, 'rounded');
    })
    
    produk3.on("success", function(file) {
     Materialize.toast('Be patient your image still processing!', 5000, 'rounded');
    });

/////////////////////////////////

    var produk4= new Dropzone("#produk4");
    produk4.on("error", function(file) {
        Materialize.toast('Failed to upload file!', 5000, 'rounded');
    })
    
    produk4.on("success", function(file) {
     Materialize.toast('Be patient your image still processing!', 5000, 'rounded');
    });
/////////////////////////////////

    var produk5= new Dropzone("#produk5");
    produk5.on("error", function(file) {
        Materialize.toast('Failed to upload file!', 5000, 'rounded');
    })
    
    produk5.on("success", function(file) {
     Materialize.toast('Be patient your image still processing!', 5000, 'rounded');
    });
/////////////////////////////////

    var produk6= new Dropzone("#produk6");
    produk6.on("error", function(file) {
        Materialize.toast('Failed to upload file!', 5000, 'rounded');
    })
    
    produk6.on("success", function(file) {
     Materialize.toast('Be patient your image still processing!', 5000, 'rounded');

    });



    })
    
    </script> 
    
    <script type="text/javascript">
$(document).ready(function(){
 $(".button-collapse").sideNav();
  $('select').material_select();
  });

</script>