    <!-- Footer -->
    <div class="container mt-auto">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-bottom">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 UET University, Inc</p>

            <a href="#"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <img src="public/image/res.png" alt="mdo" width="90" height="90">
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Trang chủ</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About us</a></li>
            </ul>
        </footer>
    </div>
    <div id="backtop">
        <i class="fa-solid fa-arrow-up"></i>
    </div>
    <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop()) {
                    $('#backtop').fadeIn();
                } else {
                    $('#backtop').fadeOut();
                }
            });
            $('#backtop').click(function () {
                $('html,body').animate({ scrollTop: 0 }, 500);
            });
        }); 
    </script>
</body>

</html>