   </div>
   <!-- /.row -->

   </div>
   <!-- /.container -->

   <!-- Footer -->
   <footer class="py-5 bg-transparent">
       <div class="container">
           <p class="m-0 text-center text-white">Copyright &copy; Haikal | XII RPL 2 2019</p>
       </div>
       <!-- /.container -->
   </footer>

   <!-- Bootstrap core JavaScript -->
   <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Active where access in controller view -->
   <?php if ($this->uri->segment(2) == 'view') : ?>

       <script>
           $(document).ready(function() {
               $('.after_purchased').hide();

               //Custome function    
               function addCommas(nStr) {
                   nStr += '';
                   x = nStr.split('.');
                   x1 = x[0];
                   x2 = x.length > 1 ? '.' + x[1] : '';
                   var rgx = /(\d+)(\d{3})/;
                   while (rgx.test(x1)) {
                       x1 = x1.replace(rgx, '$1' + '.' + '$2');
                   }
                   return x1 + x2;
               }

               // System payment   
               $('#product_purchased').on('keyup', function() {
                   var product_purchased = $('#product_purchased').val();
                   var total = <?= $product['product_price'] ?> * product_purchased + 15000;
                   $('#product_total').val('Rp.' + addCommas(total));
                   $('.after_purchased').show();

                   if ($('#product_purchased').val() == "") {
                       $('.after_purchased').hide();
                   }
               });

           });
       </script>
   <?php endif; ?>

   </body>

   </html>