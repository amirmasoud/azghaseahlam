angular.module('imageService', [])

.factory('Image', function($http) {
    return {
        // get all the images
        get : function(page) {
            return $http.get('/api/images', {
            	params: { page: page }
            });
        },
        singular : function(id) {
            return $http.get('/api/images/' + id, {
            	params: { id: id }
            });
        }
    }
});