<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Error</title>
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}


		* {
			transition: all 0.4s;
		}

		html {
			height: 100%;
		}

		body {
			font-family: 'Lato', sans-serif;
			color: #888;
			margin: 0;
			user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			-khtml-user-select: none;
			-webkit-user-select: none;
		}

		#main {
			display: table;
			width: 100%;
			height: 100vh;
			text-align: center;
		}

		.fof {
			display: table-cell;
			vertical-align: middle;
		}

		.fof h1 {
			font-size: 50px;
			display: inline-block;
			padding-right: 12px;
			animation: type .4s alternate infinite;
		}

		@keyframes type {
			from {
				box-shadow: inset -3px 0px 0px #888;
			}

			to {
				box-shadow: inset -3px 0px 0px transparent;
			}
		}
	</style>
</head>

<body>
	<div id="main">
		<div class="fof">
			<h1>404 Halaman tidak ditemukan</h1>
			<!-- <?php echo $message; ?> -->
			<p>Maaf, halaman yang anda minta tidak tersedia</p>
		</div>
	</div>
</body>

</html>