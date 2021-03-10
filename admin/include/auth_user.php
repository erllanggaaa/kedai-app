<?php
		if($_SESSION["jabatan"] == 'Admin'){
			header("location: ");
		}else if($_SESSION["jabatan"] == 'Developer'){
			header("location: ");
		}else{
			{header("location: ../login?pesan=masuk-dulu");}
		}
?>