@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Delete the records from <b>Financial data</b></div>

                <div class="panel-body">
                    
                    <h4 class="text-center">Fill in any specific field for delete</b></h4>
                     <form action="{{ route('finRetreive') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <br/>
                        <label style="padding-right: 1%">Title Serial:</label>
                        <input type= "text" name="titleSerial"/>
                        <br />
                        <label style="padding-right: 6.2%">ISBN:</label>
                        <input type="text" name="ISBN"/>
                        <br/>       
                        <label>PO Number:</label>
                        <input type="number" name="PBONum" /> 
                        
    
        
                        <br />
                        <br/>   
                        <input type="submit" name="search" class="sub2" value="Search" />
                    </form>
                    <br/>
                    @if ( Session::has('zero') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('zero') }}</strong>
       {{Session::forget('zero')}} 
    </div>
    @endif
                    @if(!empty($result))
                    <br/>
                    <br/>
                        <table border="1" font-size="0.5em" cellpadding="10" ><thead>
                        <tr>
                            <th scope="col" >PBO Num</th>
                            <th scope="col" width="15%">Title  </th>
                            <th scope="col" >ISBN</th>
                            <th scope="col" >Title Serial</th>
                            <th  scope="col" width="10%" >PO Qty</th>
                            <th scope="col"  >Total Unit Cost</th>
                            <th scope="col" >Delete?</th>
                        <tr></thead> <tbody>  
                        @if(count($fin_results)<1)
                            <h4>No results found in Financial Data</h4>
                        @else 
                       
                            @foreach($fin_results as $a)
                            <tr>
                                <form method="POST" action="{{route('finDeleteProcess')}}"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="PONUM" value="{{$a->PONUM}}"/>
                                <td>{{$a->PONUM}}</td>
                                <td>{{$a->TITLENAME}}</td>
                                <td>{{$a->ISBN}}</td>
                                <td>{{$a->ORDERQTY}}</td>
                                <td>{{$a->UNITPRICE}}</td>
                                <td>{{$a->TOTALPRICE}}</td>
                                <td><input type="submit" value="delete?" name="deleteb"/></td>
                                </form>
                            </tr>
                            @endforeach
                        
                        @endif

                        </tbody></table>
                    @endif
                    <br/>
                    <br/>
                    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    {{Session::forget('success')}}
    @endif

    @if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>{{ Session::get('error') }}</strong>
       {{Session::forget('error')}} 
    </div>
    @endif
                    
                </div>

                 
            </div>
        </div>
    </div>
</div>
@endsection
