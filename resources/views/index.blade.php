<!DOCTYPE html>
<html lang="pt-BR" ng-app="Customers">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <h2>Cadastro de Clientes</h2>
    <div ng-controller="CustomerController">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Celular</th>
                <th>Senha</th>
                <th>IP</th>
                <th>
                    <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Adicionar Novo Cliente</button>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="customer in customers">
                <td>@{{ customer.id }}</td>
                <td>@{{ customer.firstname }}</td>
                <td>@{{ customer.lastname }}</td>
                <td>@{{ customer.email }}</td>
                <td>@{{ customer.birthday }}</td>
                <td>@{{ customer.telephone }}</td>
                <td>@{{ customer.cellphone }}</td>
                <td>@{{ customer.password }}</td>
                <td>@{{ customer.ip }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('edit', customer.id)">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(customer.id)">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
        <!-- show modal  -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">@{{form_title}}</h4>
                    </div>
                    <div class="modal-body">
                        <form name="formCustomer" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                           placeholder="Nome..." value="@{{firstname}}"
                                           ng-model="customer.firstname" ng-required="true">
                                    <span ng-show="formCustomer.firstname.$invalid && formCustomer.firstname.$touched">Nome do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sobrenome</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lastname" name="lastname"
                                           placeholder="Sobrenome..." value="@{{lastname}}"
                                           ng-model="customer.lastname" ng-required="true">
                                    <span ng-show="formCustomer.lastname.$invalid && formCustomer.lastname.$touched">Sobrenome do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">E-mail</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="E-mail..." value="@{{email}}"
                                           ng-model="customer.email" ng-required="true">
                                    <span ng-show="formCustomer.email.$invalid && formCustomer.email.$touched">E-mail do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Data de Nascimento</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="birthday" name="birthday"
                                           placeholder="Ex: 18/11/1994" value="@{{birthday}}"
                                           ng-model="customer.birthday" ng-required="true">
                                    <span ng-show="formCustomer.birthday.$invalid && formCustomer.birthday.$touched">Data de Nascimento do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Telefone</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="telephone" name="telephone"
                                           placeholder="Ex: (14)3572-4112" value="@{{telephone}}"
                                           ng-model="customer.telephone" ng-required="true">
                                    <span ng-show="formCustomer.telephone.$invalid && formCustomer.telephone.$touched">Telefone do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Celular</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cellphone" name="cellphone"
                                           placeholder="Ex: (14)99634-1799" value="@{{telephone}}"
                                           ng-model="customer.cellphone" ng-required="true">
                                    <span ng-show="formCustomer.cellphone.$invalid && formCustomer.cellphone.$touched">Celular do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Senha</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="" value="@{{password}}"
                                           ng-model="customer.password" ng-required="true">
                                    <span ng-show="formCustomer.password.$invalid && formCustomer.password.$touched">Senha do Cliente é um campo obrigatório</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">IP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ip" name="ip"
                                           placeholder="192.168.1.1" value="@{{ip}}"
                                           ng-model="customer.ip" ng-required="true">
                                    <span ng-show="formCustomer.ip.$invalid && formCustomer.ip.$touched">IP do Cliente é um campo obrigatório</span>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)"
                                ng-disabled="formCustomer.$invalid">Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>
<script src="{{ asset('angular/app.js') }}"></script>
<script src="{{ asset('angular/controllers/CustomerController.js') }}"></script>

</body>
</html>