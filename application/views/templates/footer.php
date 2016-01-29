    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; - FACCI 2015-2016 - Quinto "A" </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?=base_url()?>public/js/guardarMaterias.js"></script>
    <script src="<?=base_url()?>public/chosen/chosen.jquery.min.js"></script>
</body>
<script type="text/javascript">
        $('.select-periodo').chosen({
            placeholder_text_single: 'Seleccione un periodo',
            max_selected_options: 1,
            search_contains: true,
            allow_single_deselect: true,
            no_result_text: 'No se encotraro resultados'
        });
        $('.select-nivel').chosen({
            placeholder_text_single: 'Seleccione un nivel',
            max_selected_options: 1,
            search_contains: true,
            allow_single_deselect: true,
            no_result_text: 'No se encotraron resultados'
        });
        $('.select-notas').chosen({
            placeholder_text_multiple: 'Seleccione un máximo de 7 materias',
            max_selected_options: 7,
            search_contains: true,
            no_result_text: 'No se encotraron resultados'
        });
        $('.materia').chosen({
            placeholder_text_single: 'Seleccione una materia',
            max_selected_options: 1,
            search_contains: true,
            allow_single_deselect: true,
            no_result_text: 'No se encotraron resultados'
        });
        $('.alumno').chosen({
            placeholder_text_single: 'Seleccione un alumno',
            max_selected_options: 1,
            search_contains: true,
            allow_single_deselect: true,
            no_result_text: 'No se encotraron resultados'
        });
    </script>
</html>