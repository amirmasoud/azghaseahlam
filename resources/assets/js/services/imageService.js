angular.module('imageService', [])

.factory('Image', function($http) {
    return {
        // get all the images
        get : function() {
            return $http.get('/api/images');
        }
    }
});