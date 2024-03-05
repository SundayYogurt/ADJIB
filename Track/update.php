 <?php

    echo '
 <script type="text/javascript">
     $(document).ready(function() {

       Swal.fire({
  title: 'Error!',
  text: 'Do you want to continue',
  icon: 'error',
  confirmButtonText: 'Cool'
})
 </script>
 ';
    ?>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     import Swal from 'sweetalert2'

     // or via CommonJS
     const Swal = require('sweetalert2')
 </script>