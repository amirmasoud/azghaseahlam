        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>


        <!-- Large modal -->
        <div class="modal fade photo-modal-lg" tabindex="-1" role="dialog">
            <div class="modal-custom">
                <div class="modal-content">
                    <img class="img-responsive standard-resolution" alt="">
                    <div class="modal-footer">
                        <div class="row">
                            <a href="#" 
                                class="next-image"
                                data-toggle="modal" 
                                data-target=".photo-modal-lg" 
                                data-standard-resolution="" 
                                data-caption-text="" 
                                data-link="">
                                <div class="col-xs-1">
                                    <i class="glyphicon glyphicon-menu-left"></i>
                                </div>
                            </a>
                            <div class="col-xs-10">
                                <p class="caption-text"></p>
                            </div>
                            <a href="#"
                                class="prev-image"
                                data-toggle="modal" 
                                data-target=".photo-modal-lg" 
                                data-standard-resolution="" 
                                data-caption-text="" 
                                data-link="">
                                <div class="col-xs-1">
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->     

    </div>
    <!-- /.container -->

    <script src="{{ elixir('js/all.js') }}"></script>

</body>

</html>
