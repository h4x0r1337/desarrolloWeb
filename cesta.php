<?php
include_once("funciones/mantener_sesion.php");
validarSesion();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/aluxe.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="shortcut icon" href="imagenes/favicon.ico" />
    <script src="js/cookie.js"></script>
    <script src="js/cerrarSesion.js"></script>
    <!-- InstanceBeginEditable name="doctitle" -->
<title>Tienda Alux</title>
<!-- InstanceEndEditable -->
    <!-- InstanceBeginEditable name="head" -->
    <script src="js/muestraProductos.js"></script>
<!-- InstanceEndEditable -->
</head>

<body>
    <div id="container">
        <div id="header">
            <div class="Inicio" >
            	<div id="menuprincipal">
                    <ul class="menu">
                    <?php
                    	if(isset($_SESSION['cidusuario'])) {
                    ?>
                    			<li> <a href="index.php" >Inicio</a></li>
                    <?php
                        	if(isset($_SESSION['esAdmin']) && !$_SESSION['esAdmin']) {
                    ?>
                                
                                <li> <a href="cesta.php">Cesta</a></li>
                                <!--<li> <a href="../historial.php">Transacciones</a></li> -->
                                <li> <a href="contacto.php" >Contacto</a></li>
					<?php
                    		}
                        }
                        else{
                    ?>
                    		<li> <a href="index.php" >Inicio</a></li>
                            <li> <a href="contacto.php" >Contacto</a></li>
                    <?php
                            }
                    ?>
           			</ul>
            	</div>
            
                <div id="bienvenido" >
                 
                    <ul class="menu">
                        <?php
                            if(isset($_SESSION['cidusuario'])) {
                            	if(isset($_SESSION['esAdmin']) && $_SESSION['esAdmin']) {
                        ?>   
                        <li> <a>Administración</a> 
                        <ul>
                            <li> <a href="usuarios.php">Usuarios</a></li>
                            <li> <a href="productos.php">Productos</a></li>
                           <!-- <li> <a href="editarproducto.php">Editar&nbsp;Producto</a></li> -->
                            
                        </ul>
                    </li>
                    
                    
						<?php
                        		}
                        ?>
                            	<li>  <a href="perfil.php?cidusuario=<?php echo ( $_SESSION['cidusuario'])?> " > Perfil</a></li>
                            	<li><a href="Javascript:cerrarCesion()">Cerrar sesión  ( <?php echo ($_SESSION["cidusuario"]); ?> ) </a></li>
                        <?php
                            } 
                            else {
                        ?>
                            <li><a href="crearcuenta.php" >Crear cuenta </a></li>
                            <li><a href="sesion.php">Iniciar sesión</a></li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
              </div>  
        	
            
            <div class="header">
                <div id="logo"><a href="index.php"><img src="imagenes/logoo.png" width="250" height="158"/></a></div>
                <div id=carrito ><img  src="imagenes/carrito.png" width="100" height="80" /> </div>
                <div id="busqueda"> 
                    <div id="botonbusqueda"> </div>
                    <FORM METHOD=GET ACTION="buscar.php ">
   <input type="text" onkeydown="this.style.color = '#ffffff';" onclick="this.value = '';" value="Buscar productos por nombre y precio" name="search"/> 
</FORM>
   
                </div>
            </div>
            
        	<br />
            
            <div id="menuprincipal"> 
            
                <ul class="menu">
                    <li> <a href="caballeros.php" >Caballeros</a> 
                        <ul>
                            <li> <a href="guayaberascaballeros.php">Guayaberas</a></li>
                            <li> <a href="pantalonescaballeros.php">Pantalones</a></li>
                            <li> <a href="zapatoscaballeros.php">Zapatos</a></li>
                        </ul>
                    </li>
                    <li> <a href="damas.php">Damas</a>
                        <ul>
                            <li> <a href="vestidosdama.php">Vestidos</a></li>
                            <li> <a href="zapatosdama.php">Zapatos</a></li>
                        </ul> 
                    </li>
                    <li> <a href="ninos.php" >Niños</a>
                        <ul>
                            <li> <a href="guayaberasninos.php">Guayaberas</a></li>
                            <li> <a href="pantalonesninos.php">Pantalones</a></li>
                            <li> <a href="zapatosninos.php">Zapatos</a></li>
                        </ul> 
                    </li>
                    <li> <a href="ninas.php" >Niñas</a>
                    	<ul>
                    		<li> <a href="vestidosninas.php">Vestidos</a></li>
                            <li> <a href="zapatosninas.php">Zapatos</a></li>
                        </ul>
                    </li>
                </ul>
            
            </div>
        </div> 
        
        <div id="content">
        <!-- InstanceBeginEditable name="RegionParaEditar" -->
<h1>Cesta</h1>
<div id="Total" class="panelDerecha">
<table class="tabla">
<tr>
	<th class="primero" align="right">Cesta</th>
    <th class="ultimo"></th>
</tr>
<tr>
	<td align="right">Articulos:</td>
    <td align="center" id="cantidad_productos"></td>
</tr>
<tr>
	<td align="right">Total:</td>
    <td align="center" id="costo_total"></td>
</tr>
<tr>
	<td colspan="2" align="center"><a href="pagar.php"><button id="btn_pagar" >Pagar</button> </a></td>
</tr>
</table>
</div>
<table id="tablaCarrito" class="tabla">
  <!--<tr>
    <th class="primero" scope="col">Artículo</th>
    <th width="10">&nbsp;</th>
    <th scope="col">Talla</th>
    <th width="10">&nbsp;</th>
    <th scope="col">Cantidad</th>
    <th width="10">&nbsp;</th>
    <th scope="col">Precio unitario</th>
    <th width="10">&nbsp;</th>
    <th scope="col">Subtotal</th>
    <th width="10">&nbsp;</th>
    <th class="ultimo" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td align="left">Blusa Pepem</td>
    <td width="10">&nbsp;</td>
    <td>CH</td>
    <td width="10">&nbsp;</td>
    <td><input type="number"/></td>
    <td width="10">&nbsp;</td>
    <td>$150.00</td>
    <td width="10">&nbsp;</td>
    <td>$450.00</td>
    <td width="10">&nbsp;</td>
    <td><a href="#"><img id="img_eliminar" src="imagenes/eliminar.png"/></a></td>
  </tr>
  <tr>
    <td align="left">Camisa José Luis</td>
    <td width="10">&nbsp;</td>
    <td>Med</td>
    <td width="10">&nbsp;</td>
    <td><input type="number"/></td>
    <td width="10">&nbsp;</td>
    <td>$200.00</td>
    <td width="10">&nbsp;</td>
    <td>$200.00</td>
    <td width="10">&nbsp;</td>
    <td><a href="#"><img id="img_eliminar" src="imagenes/eliminar.png"/></a></td>
  </tr>
  <tr>
    <td>Pantalón</td>
    <td width="10">&nbsp;</td>
    <td>Med</td>
    <td width="10">&nbsp;</td>
    <td><input type="number"/></td>
    <td width="10">&nbsp;</td>
    <td>$350.00</td>
    <td width="10">&nbsp;</td>
    <td>$700.00</td>
    <td width="10">&nbsp;</td>
    <td><a href="#"><img id="img_eliminar" src="imagenes/eliminar.png"/></a></td>
  </tr>-->
</table>

<!-- InstanceEndEditable -->
        </div>
        
        <div id="footer">
            <div class="column">
              	<h3>¿Quiénes somos?</h3>
              	<ul>
                	<li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="historia.php">Historia de Yucatán</a></li>
				</ul>
            </div>
            
            <div class="column">
              	<h3>Privacidad y términos</h3>
              	<ul>
					<li><a href="terminos.php">Términos y Condiciones</a></li>
					<li><a href="politicas.php">Políticas de Privacidad</a></li>
              	</ul>
            </div>
            
            <div class="column">
            	<div id="powered">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alux &copy; 2014</div>
            </div>
    	</div>
    </div>

</body>
<!-- InstanceEnd --></html>