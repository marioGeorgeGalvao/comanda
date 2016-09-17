        <style type="text/css">
			
			.wrapper {
  height: 100%;
  min-height: 100%;
  display: -webkit-flex;
  display: flex;
  -webkit-align-items: center;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
  
}
.wrapper div { border-radius:5px; background:#FFF; }
              #mesas ul li a:link{text-decoration:none; color:#666; cursor:pointer; display:block;}
            #mesas li{ float:left; margin-right:5px; margin-top: 15px; margin-bottom:5px; list-style:none; border-radius:5px; border:2px solid #e7e7e7; text-align:center; padding:5px; 
                       width:108px; height:100px; background-color:#f2f2f2; cursor:pointer; display:block;}
            #mesas li:hover{background-color:#FFF; font:bold; border: solid 2px #FFF; box-shadow: 0px 0px 1em #666;


        </style>
        

            <div class="row">

<div class="wrapper">
                <div id="mesas">

                    <ul>
                        <h1>AREA DE MESAS</h1>
                        <?php
                        $sql = mysql_query("SELECT * FROM mesa ORDER BY idmesa ASC");
                        while ($ver = mysql_fetch_array($sql)) {

                            $idmesa = $ver['idmesa'];
                            $numero_mesa = $ver['numero_mesa'];
                            $lugar_mesa = $ver['lugar_mesa'];
                            $idGarcon = $ver['idGarcon'];
							$situacao = $ver['situacao'];


                            if ($situacao == 0) {
                                $img = "<img src='img/mesafechada.png' width='80' height='47' border='0'>";
                            } else {
                                $img = "<img src='img/mesaaberta.png' width='80' height='47' border='0'>";
                            }
                            ?>

	<li><a href="comanda.php?&idmesa=<?php echo $idmesa ?>">
<?php echo $img; echo "<br/>"; echo 'Nº ' . $numero_mesa ?></a>Abrir</li>


<?php } ?>
                    </ul>
                </div>    
</div>
            </div>