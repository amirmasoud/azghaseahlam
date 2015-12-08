@include ('theme.header')

<div class="row" infinite-scroll="loadMore()">
    <div class="col-md-3 col-sm-6 portfolio-item" ng-repeat="image in images track by $index" ng-animate=" 'animate' ">
        <a href="#" data-toggle="modal" data-target=".photo-modal-lg" data-standard-resolution="" data-caption-text="" data-link="" ng-click="openImage(image.id)">
            <img class="img-responsive" ng-src="<< image.low_resolution >>" alt="">
        </a>
    </div>
</div>

@include ('theme.footer')
