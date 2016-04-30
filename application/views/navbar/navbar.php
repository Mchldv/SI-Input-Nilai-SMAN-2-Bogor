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
	