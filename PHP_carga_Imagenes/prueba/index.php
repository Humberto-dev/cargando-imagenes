<form name ="dormUpdate" class="form" method="post" action="update.php" align="center">

    <div align="center"></div>
    <div class="info" align="center">
        <fieldset>
            <p> Producto </p>
            <label for="id"> <input id="id"   value="<?php echo $id; ?>"      type="hidden"   name="id" />
            <label for="imagen_chica"> <span>Imagen Chica:  </span>  <input id="imagen_chica"   value="<?php echo 'No Change'; ?>"   type="file"     name="imagen_chica"  /></label><br>
            <label for="changed1"> <span>Cambiar:  </span>  <input id="changed1"     type="checkbox"     name="changed1"  /></label><br>
            <label for="imagen_grande"> <span>Imagen Grande:</span>  <input id="imagen_grande"  value="<?php echo 'No Change'; ?>"   type="file"     name="imagen_grande" /></label><br>
            <label for="changed2"> <span>Cambiar:  </span>  <input id="changed2"     type="checkbox"     name="changed2"  /></label><br>
        </fieldset></form>