<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; {{ config('app.name') }} {{ date('Y') }} | Created with <i
                    class="fas fa-fw fa-heart text-danger"></i> by <a href="https://github.com/mrizkimaulidan"
                    target="_blank">Muhammad
                    Rizki Maulidan</a></span>
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

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Sweetalert -->
<script src="{{ asset('vendor/sweetalert2/sweetalert2.js') }}"></script>

<!-- Selectize -->
<script src="{{ asset('vendor/selectize/js/standalone/selectize.js') }}"></script>

<script>
    $(function() {

        $('#datatable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.10.22/i18n/id.json",
            },
            lengthMenu: [
                [5, 10, 15, 20, 25, 50, 75, 100, -1],
                [5, 10, 15, 20, 25, 50, 75, 100, "All"],
            ],
        });

        $('.delete-button').click(function (e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Hapus?',
                text: "Data tidak akan bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Tidak',
                reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().submit();
                }
            });
        });
        
        $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    });
</script>

@stack('js')

@stack('modal')

</body>

</html>