            <footer class="footer fixed-bottom bottom-0 z-1">
                <div class="container-fluid w-100">
                    <div class="row">
                        <div class="col-12 text-center bg-secondary-subtle p-2">
                            <h6>Copyright &copy; 2024 | Created with ❤️ by Andrea</h6>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--ajax-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../src/js/script.js"></script>

    <!--sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function(){
            $('.del').on('click', function(e) {
                e.preventDefault();
                const href = $(this).attr('href')

                Swal.fire({
                    title : 'Are you sure?',
                    text : 'This record will be deleted permanently!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if(result.value){
                        document.location.href = href;
                    }
                })
            });
        });
    </script>

    <!--data tables-->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>