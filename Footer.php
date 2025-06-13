<footer class=" footer mt-auto py-5 bg-ligth">
    <div class="container footer">
        <!-- pied de page -->
        <!-- <footer class="border-top bg-light" id="contact" id="contact"> -->
        <div class="container py-5">
            <div class="row gy-4 align-items-center">
                <div class="col-12 col-md-4">
                    <a class="navbar-brand text-dark text-uppercase fw-bold" href="#">
                        <span class="bg-primary  p-2 rounded-3 text-light">REDDY</span> NZ
                    </a>
                </div>
                <div class="col-12 col-md-4 text-md-center">
                    <ul class="list-unstyled mb-0">
                        <a href="#" class="text-decoration-none text-dark"
                            data-bs-toggle="modal" data-bs-target="#mentionsLegales">Mentions légales</a>
                    </ul>
                </div>
                <div class="col-12 col-md-4 text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="tooltip" title="linkedin"><i class="bi bi-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/REDDYNZOLOKO3" target="_blank" class="text-decoration-none text-dark" data-bs-toggle="tooltip" title="instagram"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="tooltip" title="Twitter"><i class="bi bi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/reddy nzoloko RN" target="_blank" class="text-decoration-none text-dark" data-bs-toggle="tooltip" title="facebook"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/reddynzoloko@gmail.com" target="_blank" class="text-decoration-none text-dark" data-bs-toggle="tooltip" title="github"><i class="bi bi-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mentionsLegales" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mentions Légales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Le developpeur de cette page Web est REDDY NZOLOKO de Butembo retrouve moi au +243 971920530
                            même numero sur mon compte Whatsapp et mon compte IG instagramm est REDDY Nzoloko 3
                            Mon mail est reddynzoloko@gmail.com
                            si tu veux faire un site statique, dynamique n'hesite pas à me contacter merci pour la lecture de
                            nos mentions legales IN GOD WE TRUST
                        </p>
                        <p>
                            Nunc auctor semper turpis. Duis quam velit, aliquam ut mi vel REDDY NZOLOKO , sollicitudin dapibus erat.
                            Etiam
                            vitae +243 971920530
                            malesuada urna. reddynzoloko@gmail.com
                            Vestibulum scelerisque lacus at molestie cursus. Donec placerat enim id enim feugiat
                            gravida.
                            Integer ut
                            maximus libero.
                            Nulla faucibus dolor vitae varius rutrum. Nunc neque sem, convallis id lorem quis, vulputate
                            imperdiet
                            eros. Donec
                            viverra commodo congue.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <span class="text-muted">CopyRight 2025 By Reddy</span>
    </div>
    <!-- Initialisation de la data tables -->
    <!-- data tables -->
    <script>
        $(document).ready(function() {
            $('#datatable, #datatables, #datatableCom').DataTable({
                responsive: true,
                language: {
                    lengthMenu: "Afficher _MENU_ enregistrements",
                    search: "Rechercher :",
                    info: "Affichage de _START_ à _END_ sur _TOTAL_ enregistrements",
                    paginate: {
                        next: "Suivant",
                        previous: "Précédent"
                    }
                }
            });
        });
    </script>
    <!-- Responsivité des datas tables -->
    <!-- jQuery et DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Responsive extension -->
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>


    <!-- <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true
            });
            $('#datatables').DataTable({
                responsive: true
            });
            $('#datatableCom').DataTable({
                responsive: true
            });
        });
    </script> -->
    <!-- <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
            responsive: true
        });
    </script> -->
    <!-- DataTables Deux dans l'espace admi --> <!-- Initialisation de la data tables -->
    <!-- <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
            responsive: true
        });
    </script> -->
    <!-- Datatables pour le commande -->
    <!-- <script>
        $(document).ready(function() {
            $('#datatableCom').DataTable();
            responsive: true
        });
    </script> -->
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Traduction de ma dataTable -->
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $("#DataTable").dataTable({
                "olanguage": {
                    "sLengthMenu": "Afficher _MENU_ Enregistrements",
                    "sSearch": "Rechercher:",
                    "sInfo": "Total de _TOTAL_ Enregistrements (_END_/_TOTAL_)",
                    "oPaginate": "Suivant",
                    "sPrevious": "Precedents"
                }
            })
        });
    </script> -->

    <script>
        const Tooltips = document.querySelectorAll('.tt')
        tooltips.forEach(t => {
            new boostrap.Tooltips(t)
        })
    </script>
    <!-- Java script pour le formulaire -->
    <script>
        function toggleForms() {
            const login = document.getElementById("loginForm");
            const register = document.getElementById("registerForm");
            login.style.display = login.style.display === "none" ? "block" : "none";
            register.style.display = register.style.display === "none" ? "block" : "none";
        }
    </script>
    <!-- Java script pour le carroucel -->
    <script>
        function toggleForms() {
            const login = document.getElementById("loginForm");
            const register = document.getElementById("registerForm");
            login.style.display = login.style.display === "none" ? "block" : "none";
            register.style.display = register.style.display === "none" ? "block" : "none";
        }
    </script>

    <!-- Script pour allumer les boutons like et dislike -->
    <script>
        function garderActif(button) {
            button.classList.add("active"); // ajoute la classe Bootstrap .active

            setTimeout(() => {
                button.classList.remove("active"); // la retire après 300 ms
            }, 300);
        }
    </script>
    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Script pour  -->
    </body>

    </html>