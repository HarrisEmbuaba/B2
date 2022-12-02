<!-- <html> -->
<!-- <head>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('a.close').click(function(eve){
			
			eve.preventDefault();
			$(this).parents('div.popup').fadeOut('slow');
		});
	});
</script>
<style type="text/css">
	body{
		width:100%;
		height:100%;
		margin:0;
		padding:0;
	}
	div.popup{
		position:fixed;
		top:0;
		bottom:0;
		left:0;
		right:0;
		width:100%;
		height:100%;
	}
	
	div#box{
		margin:5% auto;
		background:#DD8B55 75%;
		width:50%;
		height:50%;
		-webkit-box-shadow:0 0 15px #DD8B55;
		-moz-box-shadow:0 0 15px #DD8B55;
		box-shadow:0 0 15px #DD8B55;
	}
	
	a.close{
		text-decoration:none;
		color:#000;
		margin:10px 15px 0 0;
		float:right;
		font-family:sans-serif;
		font-size:20px;
	}
</style>
</head>
<body>
	<!-- bagian popup -->
	<!-- <div class="popup">
		<div id="box">
			<a class="close" href="#">X</a>
		</div>		
	</div> -->
	<!-- akhir dari popup -->
<!-- 	
	<h1 href="pesan2.php"></h1>
	<p href="pesan2.php"></p> --> -->

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cara Membuat Auto Pop Up Menggunakan HTML dan CSS</title>
  <link rel="stylesheet" href="styleModal.css">
</head>
<body>
  <article>
    <div class="" href=""></div>
  </article>
  
  <!– start popup –>
  <div id="close">
    <div class="modal">
      <form action="#" method="post" class="modal-form">
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <div class="row mb-3">
                  <label for="search" class="col-sm-2 col-form-label">Cari Barang</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="search" id="formSearch" name="search" values="" required>
                  </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-secondary" href="pesan2.php">Close</button>
                <button type="submit" class="btn btn-primary" href="pesan2.php">Save changes</button>
            </div>
            </div>
        </div>
      </div>
      </form>
      <a class="close" href="pesan2.php">close</a>
    </div>
  </div>
  <!– end popup –>
</body>
</html>
<!-- 

</body>
</html> -->