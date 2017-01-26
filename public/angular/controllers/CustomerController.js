app.controller('CustomerController', function ($scope, $http, API_URL) {
    // Recuperar lista de Clientes da API
    $http.get(API_URL + "customer")
        .success(function (response) {
            $scope.customers = response;
        });

    // Mostrar Modal
    $scope.toggle = function (modalstate, id) {
        $scope.modalstate = modalstate;
        switch (modalstate) {
            case 'add':
                $scope.form_title = "Adicionar Novo Cliente";
                break;
            case 'edit':
                $scope.form_title = "Dados do Cliente";
                $scope.id = id;
                $http.get(API_URL + 'customer/' + id).success(function (response) {
                    console.log(response);
                    $scope.customer = response;
                });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }

    // Salvar ou Atualizar Cliente
    $scope.save = function (modalstate, id) {
        var url = API_URL + "customer";
        if (modalstate === 'edit') {
            url += "/" + id;
        }
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.customer),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
            location.reload();
        }).error(function (response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }

    // delete customer record
    $scope.confirmDelete = function (id) {
        var isConfirmDelete = confirm('Are you sure you want this record?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'customer/' + id
            }).success(function (data) {
                console.log(data);
                location.reload();
            }).error(function (data) {
                console.log(data);
                alert('Unable to delete');
            });
        } else {
            return false;
        }
    }

});
