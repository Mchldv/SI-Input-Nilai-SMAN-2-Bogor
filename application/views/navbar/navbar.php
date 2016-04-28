<body>
		<div class="navbar-fixed" style="height:3.7em;">
			<nav style="background-color: #ffffff; height:3.7em; border-bottom: solid 0.35em #000000"><!--#003a75-->
			  <div class="container">
				 <div class="nav-wrapper" style="line-height:3.4em">
				 	<a href="" data-activates="slide-out" class="button-collapse"><img style="width:20px" src="<?php echo base_url();?>assets/assets/interface.png"></a>
					<a href="<?php echo base_url();?>home" class="brand-logo" style="font-size:1.2em">SMA NEGERI 2 BOGOR</a>
						<ul class="right hide-on-med-and-down">
							<li><a href="<?php echo base_url();?>penilaian/lihat" style="font-size:0.9em; ">Penilaian</a></li>
							<li><a href="" style="font-size:0.9em; ">Kelas</a></li>
                            <li><a href="" style= "font-size:0.9em; ">Mata Pelajaran</a></li>
                            <li><a href="" style= "font-size:0.9em; ">Siswa</a></li>
                            <li><a href="" style= "font-size:0.9em; ">Guru</a></li>
						</ul> 
						<ul id="slide-out" class="side-nav">
							<li><a href="">Penilaian</a></li>
							<li><a href="" style="font-size:0.9em; ">Kelas</a></li>
                            <li><a href="" style= "font-size:0.9em; ">Mata Pelajaran</a></li>
                            <li><a href="" style= "font-size:0.9em; ">Siswa</a></li>
                            <li><a href="" style= "font-size:0.9em; ">Guru</a></li>
				        </ul>
				 </div>
              </div>
			</nav>
		</div>
<div id="loginmodal" class="modal">
    <div class="modal-content">
      <div class="row">
       
         <div class="col l4 m12 s12" style="padding: 1em">
            <h4>Login</h4>
            <p>Silahkan masukkan data diri anda untuk dapat berbelanja</p>
         </div>
         <div class="col l8 m12 s12" style="padding: 1em">
            <form class="col s12" action="<?php echo base_url();?>Home/verifikasi_login_user" method="post">
                      <div class="input-field col s12">
                         <input name="email" type="text" placeholder="e.g. fikry@seveid.com">
                         <label >Email</label>
                      </div>
                      <div class="input-field col s12">
                         <input  name="password" type="password" placeholder="*****">
                         <label>Password</label>
                      </div>
                       <button type="submit" class="waves-effect waves-light btn" style="margin-top: 2em">LOGIN</button> 
                       <!--button type="submit" class="waves-effect waves-light btn btn-red" style="margin-top: 2em">LOGIN GOOGLE</button-->
            </form>
         </div>
      </div>
 
    </div>
</div>

<div id="signupmodal" class="modal">
    <div class="modal-content">
      <div class="row">
         <div class="col l4 m12 s12" style="padding: 1em; ">
            <h4>Daftar</h4>
            <p>Isi data-data anda dengan benar untuk kemudahan dan kenyamanan transaksi anda</p>
         </div>
         <div class="col l8 m12 s12" style="padding: 1em 1em 0 1em">
            <form class="col s12" action="<?php echo base_url();?>Daftarmember/registration" method="post">
                      <div class="input-field col s12">
                         <input name="nama" type="text" class="validate" placeholder="e.g. Fikry Khairytamim">
                         <label>Nama</label>
                      </div>
                      <div class="input-field col s12">
                         <input name="email" type="text" class="validate" placeholder="e.g. fikry@seveid.com">
                         <label>Email</label>
                      </div>
                      <div class="input-field col s12">
                         <input  name="no_hp" type="text" class="validate" placeholder="+6281703434377">
                         <label>Nomor HP</label>
                      </div>
                      <div class="input-field col s12">
                      <input name="alamat" type="text" class="validate"  placeholder="Jalan TB Simatupang Raya 60111">
                      <label >Alamat dan Kode Pos</label>
                      </div>
                      <div class="input-field col s6">
                         <input name="password" type="password" class="validate" placeholder="*****">
                         <label>Sandi</label>
                      </div>
                      <div class="input-field col s12 l6">
                         <input name="con_password" type="password" class="validate" placeholder="*****">
                         <label>Ketik Ulang Sandi</label>
                      </div>
                      <!-- div class="input-field col s12 l6">
                          <input type="date" class="datepicker">
                         <label>Tanggal Lahir</label>
                      </div -->
                      <p class="col s12" style="margin-top: 1.25em">
 	                 <input type="checkbox" class="filled-in" id="filled-in-box" />
                         <label for="filled-in-box">Saya setuju dengan syarat dan ketentuan <b>seveid.com</b></label>
                      </p>
                      <div class="col s12" style="margin-top: 1.25em">
                         <button type="submit" class="waves-effect waves-light btn">DAFTAR</button>
                         <!--button type="submit" class="waves-effect waves-light btn btn-red">DAFTAR DENGAN GOOGLE</button-->
                      </div>
            </form>
         </div>
      </div>
 
    </div>
</div>


    </div>
  </div>
  

	
	<script>
	var opened = false;
	function openNav() {
	    if (opened == true) closeNav()
	    else {
	       document.getElementById("catdropdown").style.height= "12em";
	       document.getElementById("catdropdown").style.opacity= "1";
	       document.getElementById("dimbg").style.display= "block";
	       opened = true;
	       }
	}
	
	function closeNav() {
	    if (opened == true) {
	    	document.getElementById("catdropdown").style.height = "0";
	    	document.getElementById("catdropdown").style.opacity= "0";
	    	document.getElementById("dimbg").style.display= "none";
	    	opened = false;
	    	}
	}
	
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15 // Creates a dropdown of 15 years to control year
	  });
  
	  $(document).ready(function(){
	    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	    $('.modal-trigger').leanModal();
	  });
  
	  $('.dropdown-button').dropdown({
		inDuration: 300,
		outDuration: 225,
	  	constrain_width: false, // Does not change width of dropdown to that of the activator
		hover: true, // Activate on hover
		gutter: 0, // Spacing from edge
		belowOrigin: true, // Displays dropdown below the button
		alignment: 'left' // Displays dropdown with edge aligned to the left of button
		}
		);
	</script>
    <script>		
      // Initialize collapse button
      $(".button-collapse").sideNav();
      // Initialize collapsible (uncomment the line below if you use the dropdown variation)
      //$('.collapsible').collapsible();
	</script>
	<style>
	    a.kategori {color: dimgray; transition: 0.2s;}
	    #a {color: rgba(228,93,37,0.87);}
	     a:hover.kategori {opacity: 0.6; transition: 0.2s;}
	    #catdropdown{background-color:white; position: fixed; width: 100%; z-index:100; overflow:hidden; height: 0px; transition:0.3s; opacity: 0;}
	    #dimbg{position:fixed; width:100%; background-color:rgba(0,0,0,0.5); z-index:95; height:100%; display: none}
	</style>
	