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
                    <img class="img-responsive standard-resolution" alt="" ng-src="<< singular.standard_resolution >>">
                    <div class="modal-footer">
                        <div class="row">
                            <span class="next-image" ng-class="{disabled: singular.next}" ng-click="openImage(singular.next)">
                                <div class="col-xs-1">
                                    <i class="glyphicon glyphicon-menu-left"></i>
                                </div>
                            </span>
                            <div class="col-xs-10">
                                <p class="caption-text"><< singular.caption_text >></p>
                            </div>
                            <span class="prev-image" ng-class="{disabled: singular.prev}" ng-click="openImage(singular.prev)">
                                <div class="col-xs-1">
                                    <i class="glyphicon glyphicon-menu-right"></i>
                                </div>
                            </span>
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
