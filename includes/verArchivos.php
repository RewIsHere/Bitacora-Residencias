<!-- Edit -->

<!-- Modal -->
<div class="modal fade" id="edit<?php echo $row['alum_nc']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivos del Alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                $edit = mysqli_query($con, "select * from docs_alumno where Id_alumno='" . $row['alum_nc'] . "'");
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
                                <label style="position:relative; top:7px;">Lastname:</label>
                            </div>
                            <div class="col-lg-10">
                                <a href="archivos/<?= $erow['Solicitus_resi']; ?>" target="_blank">VER</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->