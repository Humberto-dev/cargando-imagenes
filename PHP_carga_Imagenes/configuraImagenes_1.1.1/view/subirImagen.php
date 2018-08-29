<div id="centrado" class="col-md-12"
    <div class="center-block">
   
        <div class="container">
            <h1>Cargar Imagen</h1>
            <form method="post" enctype="multipart/form-data" action="Controller/controller.php">
            <!-- <form method="post" enctype="multipart/form-data"  > -->
                <div class="form-group">
                        <input type="file" class="form-control"  name="file" >
                </div>
                <div class="checkbox">
                        <label><input type="checkbox"  name="transpa">transparencia</label>
                </div>
                <div class="checkbox">
                        <label><input type="checkbox" name="conver" >convertir formato</label>
                </div>
                <div class="checkbox">
                        <label><input type="checkbox" name="marag" >Marca de agua</label>
                </div>
                <div class="checkbox disabled">
                        <label><input type="checkbox" name=textma"">Texto Maraca de Agua</label>
                </div>
                <div class="form-group">
                        <label for="texto">Escribe el texto</label>
                        <input type="text" class="form-control" id="textmarca">
                 </div>
                <input type="submit" name="submit"class="btn btn-primary" >
            </form>
            

        </div>
    </div>
</div>