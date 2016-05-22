<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Tu carrito de compras</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/css/styles.css">

		<style>
			body {
				background: none;
			}

			.pedidos-act {
				flex-grow: 1;
			}

			.tabla-pedido {
				margin: 0 auto;
				width: 100%;
			}

			.tabla-pedido th {
				background: #E38F27;
			}

			tr:nth-child(odd) {
				background-color: #f2f2f2
			}

			.flex-wrapper {
				display: flex;
			}

			.cooking {
				width: 50px;
				height: 50px;
				background-color: red;
			}

			.ready {
				width: 50px;
				height: 50px;
				background-color: green;
			}

			.toggle {
				cursor: pointer;
			}
		</style>



	</head>

	<body>
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
						<li>Inicio</li>
						<li>Resumen</li>
						<li>Logout</li>
						<li><a href="./login.php">Salir</a></li>
					</ul>
				</div>
			</div>
		</header>

		<main class="content">
			<div class="container">
				<!-- Tabla de pedidos actuales -->
				<h3>Tu carrito de compras</h3>
				<table class="tabla-pedido">
					<thead>
						<tr>
							<th>Descripcion</th>
							<th>Cantidad</th>
							<th>Precio individual</th>
							<th>Precio total</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Pizza mexicana grande
							<br> masa orilla de queso</td>
							<td>
							<input type="number" name="cantidad"><br>
							<input type="reset" value="Remover"/>	
							</td>
							<td>
								$199
							</td>
							<td>$199</td>
							
						</tr>
						<tr>
							<td>Refresco 2 litros</td>
							<td>
							<input type="number" name="cantidad"><br>
							<input type="reset" value="Remover"/>
							</td>
							<td>
								$24
							</td>
							<td>$68</td>
							
						</tr>
						<tr>
							<td>Paquete</td>
							<td>
							<input type="number" name="cantidad"><br>
							<input type="reset" value="Remover"/>
							</td>
							<td> $239</td>
							<td> $239</td>
							
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Total</td>
							<td> $496 </td>
						</tr>

											
					</tbody>
				</table>

			</div>
			<br>
			<br>
				

			<button name="Check out">Agregar Otra Pizza</button>


			<a class="btn" href="./checkout.php">Check Out</a>
		</main>


		<script>
			function changeImage(e) {
				var image = e;
				if (image.src.match("ready")) {
					image.src = "cook.png";
				} else {
					image.src = "ready.png";
				}
			}
		</script>

	</body>


</html>