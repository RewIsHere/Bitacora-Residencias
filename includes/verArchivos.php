<!-- Modal -->
<div class="modal fade" id="edit<?php echo $rowSql['alum_nc']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Solicitus_resi']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">CARTA ACEPTACION:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Carta_acep']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">REPORTE PRELIMINAR:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Reporte_pre']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">REPORTE FINAL:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Reporte_final']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">CUMPLIMIENTO RESIDENCIA DOCENTE:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Cumpl_resi_doce']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">EVALUACION Y SEGUIMIENTO:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Eva_segui']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">EVALUCION Y REPORTE:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Eva_repor']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">CARTA TERMINACION RESIDENCIAS:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Car_termin_resi']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                        <div style="height:10px;"></div>
                        <div class="row">
                            <div class="col-lg-2">
                                <label style="position:relative; top:7px;">LIBERACION DE REPORTE RESIDENCIAS:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Liberacion_repor']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->