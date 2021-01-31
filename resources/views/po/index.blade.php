@extends('layouts.master')
@section('content')


    <h3 class="page-title">Purchase Order</h3>
    <div class="row">
        <div class="col-md">
            <!-- BASIC TABLE -->
            <div class="panel">
                <div class="panel-body">
                    <form class="insert-form" id="insert-form" method="HEAD" action="#">
                        @csrf
                        <table class="table" id="">
                            <thead>
                            <tr>
                                <th> Date</th>
                                <th> Client </th>
                                <th> PO Number </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="date" class="form-control" id="date" name="date"  ></td>
                                <td>
                                    <select class="form-control" name="vendor" id="vendor" required>
                                        <option >Choose an option</option>
                                                       @foreach($vendors as $vendor)
                                                                <option value="{{$vendor->name}}">{{$vendor->name}}</option>
                                                       @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" id="po_no" name="po_no" placeholder="PO Number" ></td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md">
                <!-- BASIC TABLE -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Products</h3>
                    </div>
                    <div class="panel-body">
                        <form class="insert-form" id="insert-form" method="HEAD" action="#">
                            @csrf
                            <div data-role="dynamic-fields">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <h5>Product Name</h5>
                                        <select class="form-control" name="title" id="select1" required>
                                            <option >Choose an option</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->title}}">{{$product->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span> </span>
                                    <div class="form-group">
                                        <h5>Batch ID</h5>
                                        <input type="text" name="batch_id[]" id="batch_id" readonly>
                                    </div>
                                    <span> </span>
                                    <div class="form-group">
                                        <h5>Price</h5>
                                        <input type="text" name="price[]" id="price" readonly>
                                    </div>
                                    <span> </span>
                                    <div class="form-group">
                                        <h5>Quantity</h5>
                                        <input type="text" name="quantity[]" id="quantity[]" placeholder="Quantity">
                                    </div>
                                    <span> </span>
                                    <div class="form-group">
                                        <h5>Value</h5>
                                        <input type="text" name="value[]" id="value[]" placeholder="Value">
                                    </div>

                                    <div class="form-group">
{{--                                        <input type="hidden">--}}
                                        <h5>action</h5>
                                    <button class="btn btn-danger" data-role="remove">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                    <button class="btn btn-primary" data-role="add">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                    </div>
                                </div>  <!-- /div.form-inline -->
                            </div>  <!-- /div[data-role="dynamic-fields"] -->
                            <br/>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" name="submit" id="submit" value="Submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(function() {
                // Remove button click
                $(document).on(
                    'click',
                    '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
                    function(e) {
                        e.preventDefault();
                        $(this).closest('.form-inline').remove();
                    }
                );
                // Add button click
                $(document).on(
                    'click',
                    '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
                    function(e) {
                        e.preventDefault();
                        var container = $(this).closest('[data-role="dynamic-fields"]');
                        new_field_group = container.children().filter('.form-inline:first-child').clone();
                        new_field_group.find('input').each(function(){
                            $(this).val('');
                        });
                        container.append(new_field_group);
                    }
                );
            });

        </script>

        <script type="text/javascript">
            function _(x){
                return document.getElementById(x);
            }
            $(document).on('change','#select1',function(){
                let producty = $(this).val();
                $.ajax({
                    url : '/producty/' + producty,
                    method : 'GET',
                    success:function(data){
                        _('batch_id').value = data.bid;
                        _('price').value = data.price;

                    }
                });
            });
        </script>

@stop
