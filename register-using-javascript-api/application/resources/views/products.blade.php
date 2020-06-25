@extends('layout.app' , ["current" => "products"]) {{-- current is the variable that we want to pass to app.blade.php and categories is the value of the variable / then we will verify this on the navbar.blade.php--}}

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Product register</h5>
                <table class="table table-ordered table-hover" id="productsTable">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Product name</th>
                            <th>stock</th>
                            <th>price</th>
                            <th>Categorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" role="button" onclick="newProduct()">New Product</button>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="dlgProducts">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" id="formProduct" >
                    <div class="modal-header">
                        <h5 class="modal-title"> New Product </h5>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" id="id" class="form-control">

                        <div class="form-group">
                            <label for="productName" class="control-label"> Product Name </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="productName" placeholder="Product name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productStock" class="control-label"> Stock </label>
                            <div class="input-group">
                                <input type="number" min="0" class="form-control" id="productStock" placeholder="Stock">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productPrice" class="control-label"> Price </label>
                            <div class="input-group">
                                <input type="number" min="0" class="form-control" id="productPrice" placeholder=" Price ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="productCategorie" class="control-label"> Categorie </label>
                            <div class="input-group">
                                <select class="form-control" id="productCategorie">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> Save </button>
                        <button type="cancel" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : "{{ csrf_token() }}"
            }
        });


        function newProduct(){
            $('#id').val('');
            $('#productName').val('');
            $('#productStock').val('');
            $('#productPrice').val('');
            $('#dlgProducts').modal('show');
        }


        function getCategories(){
            $.getJSON('/api/categories' , function(data){
                console.log(data);
                for (i = 0 ; i < data.length ; i++){
                    option = '<option value ="' + data[i].id + '" >' + data[i].name + '</option>';
                    $('#productCategorie').append(option);
                }
            });
        }


        function createLine(p){
            var row = "<tr>" +
                "<td>" + p.id + "</td>" +
                "<td>" + p.name + "</td>" +
                "<td>" + p.stock + "</td>" +
                "<td>" + p.price + "</td>" +
                "<td>" + p.categorie_id + "</td>" +
                "<td>" +
                    '<button class="btn btn-sm btn-primary" onclick="edit(' + p.id + ')"> Edit </button>' +
                    '<button class="btn btn-sm btn-danger" onclick="remove(' + p.id + ')"> Delete </button>' +
                "</td>" +
                "</tr>";
            return row;
        }


        function remove(id){
            $.ajax({
               type: "DELETE",
                url: "/api/products/" + id,
                context: this,
                success: function(){
                   console.log("DELETED");
                   lines = $('#productsTable>tbody>tr');
                   e = lines.filter( function(i,element){
                       return element.cells[0].textContent == id;
                   })
                    if (e){
                        e.remove();
                    }
                },
                error: function(error){
                   console.log(error);
                }
            });
        }

        function edit(id){
            $.getJSON('/api/products/' + id , function(data){
                $('#id').val(data.id);
                $('#productName').val(data.name);
                $('#productStock').val(data.stock);
                $('#productPrice').val(data.price);
                $('#productCategorie').val(data.categorie_id);
                $('#dlgProducts').modal('show');
                console.log(data);
            });
        }


        function getProducts(){
            $.getJSON('/api/products' , function(products){
                for(i = 0 ; i < products.length ; i++){
                   line = createLine(products[i]);
                   $('#productsTable>tbody').append(line);
                }
            });
        }


        function createProduct(){
            var product ={
                name: $("#productName").val(),
                stock: $("#productStock").val(),
                price: $("#productPrice").val(),
                categorie_id: $("#productCategorie").val()
            };
            $.post("/api/products" , product , function(data){
                product = JSON.parse(data);
                line = createLine(product);
                $('#productsTable>tbody').append(line)
            });

        }

        function saveProduct(){
            var product ={
                id: $("#id").val(),
                name: $("#productName").val(),
                stock: $("#productStock").val(),
                price: $("#productPrice").val(),
                categorie_id: $("#productCategorie").val()
            };
            $.ajax({
                type: "PUT",
                url: "/api/products/" + product.id,
                context: this,
                data: product,
                success: function(data){
                    product = JSON.parse(data);
                    console.log("EDITED");
                    lines = $('#productsTable>tbody>tr');
                    e = lines.filter( function(i,element){
                        return element.cells[0].textContent == product.id;
                    });
                    if (e){
                        e[0].cells[0].textContent = product.id;
                        e[0].cells[1].textContent = product.name;
                        e[0].cells[2].textContent = product.stock;
                        e[0].cells[3].textContent = product.price;
                        e[0].cells[4].textContent = product.categorie_id;
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }


        $("#formProduct").submit( function(event){
            event.preventDefault();
            if ($("#id").val() != ''){
                saveProduct();
            }else{
                createProduct();
            }
            $("#dlgProducts").modal('hide');
        });


        $(function(){
            getCategories();
            getProducts();
        });

    </script>
@endsection
