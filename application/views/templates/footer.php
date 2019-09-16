
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?=$pengaturan['nama_web'] ?> 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Keluar Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar Aplikasi?</h5>
        </div>
        <div class="modal-body">Pilih tombol "Keluar" jika anda ingin keluar dari aplikasi dan mengakhiri sesi anda</div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-circle btn-secondary" type="button" data-dismiss="modal" title="batal"><i class="fa fa-fw fa-times"></i></button>
          <a class="btn btn-sm btn-circle btn-danger" href="<?=base_url('auth/keluar') ?>" title="Keluar"><i class="fa fa-fw fa-power-off"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Daftar Modal-->
  <div class="modal fade" id="daftarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat Akun Baru?</h5>
        </div>
        <div class="modal-body">Daftar Akun Baru</div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-circle btn-secondary" type="button" data-dismiss="modal" title="batal"><i class="fa fa-fw fa-times"></i></button>
          <a class="btn btn-sm btn-circle btn-primary" href="<?=base_url() ?>" title="Daftar"><i class="fa fa-fw fa-user-plus"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Lupa Sandi Modal-->
  <div class="modal fade" id="lupasandiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lupa Kata Sandi?</h5>
        </div>
        <div class="modal-body">Lupa Kata Sandi Anda</div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-circle btn-secondary" type="button" data-dismiss="modal" title="batal"><i class="fa fa-fw fa-times"></i></button>
          <a class="btn btn-sm btn-circle btn-success" href="<?=base_url() ?>" title="Kirim"><i class="fa fa-fw fa-paper-plane"></i></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/')?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('assets/')?>js/demo/chart-pie-demo.js"></script>
  <script src="<?=base_url('assets/')?>js/demo/datatables-demo.js"></script>
  <script src="<?=base_url('assets/')?>js/select2.min.js"></script>

  <script>
    $('.file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.file-label').addClass("selected").html(fileName);
    });

    $('select').select2();

    $(function () {
      $('select').each(function () {
        $(this).select2({
          theme: 'bootstrap4',
          width: 'style',
          placeholder: $(this).attr('placeholder'),
          allowClear: Boolean($(this).data('allow-clear')),
        });
      });
    });

  </script>

</body>

</html>
