    <!--Datatables Styles-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/css/dataTables.bootstrap5.min.css">

    <!--Datatables Buttons-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/css/buttons.bootstrap5.css">

    <!--Datatables Responsive-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/css/responsive.dataTables.min.css">

    <!--Datatables Scripts-->
    <script type="text/javascript" src="../assets/datatables/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/jquery.dataTables.min.js"></script>

    <!--Datatables responsive script-->
    <script type="text/javascript" src="../assets/datatables/js/dataTables.responsive.min.js"></script>

    <!--Botones para exportar-->
    <script type="text/javascript" src="../assets/datatables/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/dataTables.bootstrap5.min.js"></script>   
    <script type="text/javascript" src="../assets/datatables/js/pdfmake.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/jszip.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/buttons.html5.js"></script>
    <script type="text/javascript" src="../assets/datatables/js/buttons.print.js"></script>


    <script type="text/javascript">
    $(document).ready(function () {
        $('#tableresponsive').DataTable({
            dom: 'Bflrtip',
            buttons: [
                {//Boton Copiar
                    extend: 'copyHtml5',
                    footer: true,
                    titleAttr: 'Copiar',
                    className: 'btn btn-outline-info btn-md',
                    text: '<i class="bi bi-clipboard"></i>'
                },
                {//Botón Excel
                    extend: 'excelHtml5',
                    footer: true,
                    titleAttr: 'Exportar Excel',
                    className: 'btn btn-outline-success btn-md',
                    text: '<i class="bi bi-file-excel"></i>'
                },
                {//Botón Pdf
                    extend: 'pdfHtml5',
                    footer: true,
                    titleAttr: 'Exportar PDF',
                    className: 'btn btn-outline-danger btn-md',
                    text: '<i class="bi bi-filetype-pdf"></i>'
                },
                {//Botón print
                    extend: 'print',
                    footer: true,
                    titleAttr: 'Imprimir',
                    className: 'btn btn-outline-primary btn-md',
                    text: '<i class="bi bi-printer"></i>'
                },
                ],
            responsive: true,
            language: {
                url: '../assets/datatables/es-ES.json'
            },
        });
    });
    </script>

<?php
 if (is_array($data)) {

/*Función Eliminar registro*/
if (isset($_GET['delete'])) {
    $delete = $conn->prepare('DELETE FROM administrador WHERE idadministrador=?');
    $delete->bindParam(1,$_GET['delete']);
    $delete->execute();

    if ($delete) {
        //echo "Registro Borrado";
    ?>
    <script type="text/javascript">

        $( document ).ready(function() {
        $('#avisodel').modal('toggle')
        $('#cerrar').on('click', function () {
            $(location).attr('href','homeadm?page=tabla');
      });
        });

    </script>

    <!-- Modal eliminar datos -->
            <div class="modal fade" id="avisodel">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Alerta de datos</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Datos eliminados con éxito.
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="cerrar">Cerrar</button>
                  </div>

                </div>
              </div>
            </div>
        <!-- Modal eliminar datos  -->
    <?php
    }else{
        echo "Error al borrar";
    }
}
/*Función Eliminar registro*/

?>
<div class="container py-5">
 <table class="table table-striped table-bordered table-hover" id="tableresponsive" style="width: 100%;">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Dirección</th>
            <th>Operaciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result=$conn->prepare('SELECT * FROM administrador WHERE idadministrador!=?');
        $result->bindParam(1,$data['idadministrador']);
        $result->execute();

        while ($view=$result->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <tr>
            <td><?php echo $view['documento']; ?></td>
            <td><?php echo $view['nombre']; ?></td>
            <td><?php echo $view['apellido']; ?></td>
            <td><?php echo $view['direccion']; ?></td>
            <td>
                <a href="" title="Editar" class="btn btn-outline-primary"><i class="bi bi-pencil-fill"></i></a>
                <button type="button" data-bs-toggle="modal" data-bs-target="#delete" title="Eliminar" class="btn btn-outline-danger" title="Eliminar Datos"><i class="bi bi-trash3-fill"></i></button>
            </td>
        </tr>
        <!-- Modal eliminar datos -->
            <div class="modal fade" id="delete">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Alerta de datos</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    Realmente desea eliminar el registro con documento:
                    <p><?php echo $view['documento']; ?></p>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <a href="homeadm?page=tabla&delete=<?php echo $view['idadministrador']; ?>" title="Aceptar" class="btn btn-success">Aceptar</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                  </div>

                </div>
              </div>
            </div>
        <!-- Modal eliminar datos  -->
    <?php } ?>
    </tbody>
</table>
</div>
<?php
    }else{
        header('location: ./');
    }
?>