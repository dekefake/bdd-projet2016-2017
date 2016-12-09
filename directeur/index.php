<?php
		if(isset($_POST['submit']) && !empty($_POST['login'])){
			require_once('vue/gabarit.php');
		} else {
			header('Location: ../index.php');
		}