    <footer>
    <!--Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <!--Materialize Min-->
    <script type="text/javascript" src="<?=base_url()?>scripts/materialize.min.js"></script>
    <!--Inicializate-->
    <script type="text/javascript">
        $( document ).ready(function(){
            $('#large').DataTable();
            $('.modal-trigger').leanModal();
            $(".button-collapse").sideNav();
            $('select').material_select();
        })
    </script>
    <!--Materialize Calendar Inicializate-->
    <script type="text/javascript">
        $('.datepicker').pickadate({
            selectMonths: false,//Creates a dropdown to control month
            selectYears: 1,//Creates a dropdown of 15 years to control year
            //The title label to use for the month nav buttons
            labelMonthNext: 'Mes siguiente',
            labelMonthPrev: 'Mes anterior',
            //The title label to use for the dropdown selectors
            labelMonthSelect: 'Seleccionar mes',
            labelYearSelect: 'Seleccionar año',
            //Months and weekdays
            monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Deciembre' ],
            monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec' ],
            weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado' ],
            weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab' ],
            //Materialize modified
            weekdaysLetter: [ 'D', 'L', 'M', 'Mi', 'J', 'V', 'S' ],
            //Today and clear
            today: 'Hoy',
            clear: 'Borrar',
            close: 'Cerrar',
            //The format to show on the `input` element
            format: 'yyyy-mm-dd'
        });     
    </script>
    </footer>
</body>
</html>