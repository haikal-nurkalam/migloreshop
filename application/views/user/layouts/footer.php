   </div>
   <!-- /.row -->

   </div>
   <!-- /.container -->

   <!-- Footer -->
   <footer class="py-5 bg-transparent">
       <div class="container">
           <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
       </div>
       <!-- /.container -->
   </footer>

   <!-- Bootstrap core JavaScript -->
   <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Custome script for address system -->
   <script>
       $(document).ready(function() {
           $('.detail').hide();
           $('#prov').change(function() {
               $('.detail').show();
               const id_prov = $(this).find(':selected').data('id');
               // Req ajax 
               $.get("<?= base_url('user/getKotaById/') ?>" + id_prov, function(data) {
                   const kota = JSON.parse(data);

                   var $select = $('#kota');

                   $select.find('option').remove();
                   //loop value and insert into option    
                   $.each(kota, function(index, value) {
                       console.log(index, value.nama);
                       $select.append('<option value="' + value.nama + '">' + value.nama + '</option>');
                   });

               });
           });
       });
   </script>

   </body>

   </html>