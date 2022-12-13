<!-- Modal -->
<div class="modal fade" id="edit<?php echo $rowSql['alum_nc']; ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivos del Alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                $edit = mysqli_query($con, "select * from docs_alumno where Id_alumno='" . $rowSql['alum_nc'] . "'");
                $erow = mysqli_fetch_array($edit);
                ?>
                <div class="container-fluid">
                    <form method="POST" action="">
                        <div class="row">

                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">Solicitud residencia:</label>
                            </div>
                            <?php if ($erow['Solicitud_resi'] == null) {
                                $var1 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var1 = '<a href="archivos/' . $erow['Solicitud_resi'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var1 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">CARTA ACEPTACION:</label>
                            </div>
                            <?php if ($erow['Carta_acep'] == null) {
                                $var2 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var2 = '<a href="archivos/' . $erow['Carta_acep'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var2 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">REPORTE PRELIMINAR:</label>
                            </div>
                            <?php if ($erow['Reporte_pre'] == null) {
                                $var3 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var3 = '<a href="archivos/' . $erow['Reporte_pre'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var3 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">REPORTE FINAL:</label>
                            </div>
                            <?php if ($erow['Reporte_final'] == null) {
                                $var4 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var4 = '<a href="archivos/' . $erow['Reporte_final'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var4 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">CUMPLIMIENTO RESIDENCIA DOCENTE:</label>
                            </div>
                            <?php if ($erow['Cumpl_resi_doce'] == null) {
                                $var5 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var5 = '<a href="archivos/' . $erow['Cumpl_resi_doce'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var5 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">EVALUACION Y SEGUIMIENTO:</label>
                            </div>
                            <?php if ($erow['Eva_segui'] == null) {
                                $var6 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var6 = '<a href="archivos/' . $erow['Eva_segui'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var6 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">EVALUCION Y REPORTE:</label>
                            </div>
                            <?php if ($erow['Eva_repor'] == null) {
                                $var7 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var7 = '<a href="archivos/' . $erow['Eva_repor'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var7 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">CARTA TERMINACION RESIDENCIAS:</label>
                            </div>
                            <?php if ($erow['Car_termin_resi'] == null) {
                                $var8 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var8 = '<a href="archivos/' . $erow['Car_termin_resi'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var8 ?>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">LIBERACION DE REPORTE RESIDENCIAS:</label>
                            </div>
                            <?php if ($erow['Liberacion_repor'] == null) {
                                $var9 = 'NO SE HA SUBIDO AUN';
                            } else {
                                $var9 = '<a href="archivos/' . $erow['Liberacion_repor'] . '" target="_blank">VER</a>';
                            }
                            ?>
                            <div class="col-lg-10">
                                <?php echo $var9 ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->