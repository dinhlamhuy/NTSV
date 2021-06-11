</div>
    
    
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../vendor/jquery.table2excel.min.js"></script>

   <script src="./assets/DataTables/datatables.min.js"></script>
   <script type="text/javascript">
       $(document).ready(function() {
           $('#dataTables-example').dataTable();
       });
       $(document).ready(function() {
           $('#dsngoaitru').dataTable();
       });
       $(document).ready(function() {
           $('#newstable').dataTable();
       });
   </script>
   
    <script type="text/javascript">
      $(document).ready(function() {
  
  
        $('#sidebarCollapse').on('click', function() {
          $('#sidebar, #content').toggleClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
      });
    $("#xuatfile").click(function() {
        $("#indsngoaitru").table2excel({
        

            name: "Danhsachsvngoaitru",
            filename: "Danh sách sinh viên ngoại trú",
            fileext: ".xls"
        })
    });
    
    </script>

  </body>
  
  </html> 