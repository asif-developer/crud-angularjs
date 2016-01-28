app=angular.module('regUser',[]);
	app.controller('addUser',function($scope,$http,$window){
		$scope.emp = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/;
		// $scope.uploadFile = function(files) {
		//     var fd = new FormData();
		//     //Take the first selected file
		//     fd.append("file", files[0]);

		//     $http.post('data.php', fd, {
		//         withCredentials: true,
		//         headers: {'Content-Type': undefined },
		//         transformRequest: angular.identity
		//     }).success( function(data){ } );

		// }; // end of file uploading

		$scope.submitForm=function(){
			if($scope.regForm.$valid){
				$http.post('data.php',$scope.form).success(function(data,status,headers,config){
				if(data==1){
					alert('Info saved successfuly');
					$window.location.reload();
				}else{
					alert('Error saving the data');
				}
			})

		}
				
		} // end of submitform()
	})

	app.controller('loginUser',function($scope,$http,$window){
		//$scope.empp = /^[a-z]+[a-z0-9._]+@[a-z]+\.[a-z.]{2,5}$/;
			$scope.submitLoginForm=function(){
				if($scope.loginForm.$valid){
					$http.post('datausers.php',{user:$scope.form.username,pass:$scope.form.pass,type:'login'}).success(function(data,status,headers,config){
					if(data==1){
						$window.open('users.php','_self');
					}else{
						$scope.errMsg = 'Invalid login';
					}
				})
				}
			} // end of submitform()
	})

	app.controller('getusers',function($scope,$http,$window){

		$scope.orderByThis = function(x) {
    		$scope.myOrderBy = x;
  		}

  		$scope.editIt=function(u){
  			alert(u.fname);
  			$scope.regForm.fname=u.fname;
  		}

		$http.post('datausers.php',{type:'get_users'}).success(function(data,status,headers,config){
			$scope.user_list=data;
		})
		$scope.del = function (u) {
                
                var deleteUser = $window.confirm('Do you realy want to delete this record?');
                if(deleteUser){
                	var index = $scope.user_list.indexOf(u);
            		
                	$http.post('datausers.php',{type:'del',uid:u.uid}).success(function(data){
                		//alert('One user deleted successfulys');
                		if(data==1){
                			$scope.user_list.splice(index, 1);
                		}
                		
                	});
                	//$scope.user_list.splice(u.uid, 1);
                }
           };
	})


	app.directive('myHeading',function(){
		return { template: "<h1>Registered Users</h1>" };
	})

	app.directive('myHeading2',function(){
		return { template: "<h1>User Registeration</h1>" };
	})

	app.directive('file', function () {
	    return {
	        scope: {
	            file: '='
	        },
	        link: function (scope, el, attrs) {
	            el.bind('change', function (event) {
	                var file = event.target.files[0];
	                scope.file = file ? file : undefined;
	                scope.$apply();
	            });
	        }
	    };
	});