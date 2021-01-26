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

        <div class="col-md">
            <!-- BASIC TABLE -->
            <div class="panel">
                <div class="panel-body">
                    <form class="insert-form" id="insert-form" method="HEAD" action="#">
                        @csrf
                        <table class="table" id="table_field">
                            <thead>
                            <tr>
                                <th> Product Name </th>
                                <th> Batch ID </th>
                                <th> Price </th>
                                <th> Quantity </th>
                                <th> Total Value </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <select class="form-control" name="title[]" id="select1" required>
                                        <option >Choose an option </option>
                                        @foreach($products as $product)
                                            <option value="{{$product->title}}">{{$product->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" id="bid" name="bid[]" readonly ></td>
                                <td><input type="text" class="form-control" id="price" name="price[]" readonly  ></td>
                                <td><input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Quantity" ></td>
                                <td><input type="text" class="form-control" id="value" name="value[]" placeholder="Value" ></td>
                                <td><button name="add" class="btn btn-info btn-sm" id="addpd"><span class="lnr lnr-plus-circle"></span></button></td>
                            </tr>
                            </tbody>
                        </table>
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
        $(document).ready(function (){
            var html = '<tr>\n' +
                ' <td><input type="text" class="form-control" id="bid" name="bid[]" readonly ></td>\n'+
                ' <td><input type="text" class="form-control" id="price" name="price[]" readonly  ></td>\n'+
                ' <td><input type="text" class="form-control" id="quantity" name="quantity[]" placeholder="Quantity" ></td>\n'+
                ' <td><input type="text" class="form-control" id="value" name="value[]" placeholder="Value" ></td>\n'+
                ' <td><button name="remove" class="btn btn-danger btn-sm" id="remove"><span class="lnr lnr-trash"></span></button> </td>\n' +
                ' </tr>';
            // var x =1;
            $("#addpd").click(function (){
                $("#table_field").append(html);
            });
            $("#table_field").on('click','#remove',function (){
                $(this).closest('tr').remove();
            });
        });
    </script>
@stop
