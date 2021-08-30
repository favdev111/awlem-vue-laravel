<script src="{{url('./Panel/adminAssets/jquery-3.2.1.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.manue-active ul').removeClass('mm-show').find('a').removeClass('mm-active');
        $('#Settingss ul').addClass('mm-show').find('#Settingonealerts22').addClass('mm-active');
    });
</script>
<style>
.hearedFunction{
    background: #4892e1;
    margin: 0 auto;
    border: 1px dashed white;
    border-radius: 4px;
    width: 102% !important;
}
.hearedFunction label {
    margin: 0 auto;
    color: #ffffff;
    font-weight: bold;
    font-size: 1.8em;
    padding: 0;
    height: 36px;
}

.col-md-3.fub {
    float: right;
    background: #eaeaea;
    margin-left: 1%;
    max-width: 24% !important;
    margin-bottom: 1% !important;
    border-radius: 5px;
    box-shadow: -1px 2px 4px #bbb9b9;
}
.col-md-3.fub .form-group {
    margin: 0;
    padding-top: 9px;
    margin-bottom: 9px;
    line-height: 2;
    font-weight: bold;
   
}
</style>
@extends('admin.layout')
@section('content')
<div class="app-main__inner">

    <div class="tab-content">
        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">تصاريح المجموعات</h5>
                    <form method="post" action="">
                        <div class="row form-group">
                            <div class="col-md"></div>
                            <div class="col-md-8">
                                <select name="controllers" id="controllers" class="form-control">
                                    @if($controllers)
                                    <option value=""> Please Select Controllers</option>
                                    @foreach($controllers as $key=>$con)
                                    <option value={{$key}}>{{$key}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />

                            </div>
                            <div class="col-md"></div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-md"></div> -->
                            <div class="col-md-12 text-center">
                                <div class="pretable">

                                </div>
                            </div>
                            <!-- <div class="col-md"></div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-8 col-lg-8 form-group">
                                <input type="submit" value="Save" class='savedata btn btn-primary form-control' id='savedata'>
                            </div>
                            <div class="col-md-2  col-lg-2"></div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>


<!--<form method="post" action="">
    <select name="controllers" id="controllers">
        @if($controllers)
            <option value=""> Please Select </option>
            @foreach($controllers as $key=>$con)
                <option value={{$key}}>{{$key}}</option>
            @endforeach
        @endif
    </select>
    <input type="hidden" name="_token" value="{{csrf_token()}}" />
    <input type="submit" value="apply"/>

<div class="pre">
<table class="pretable">
    
</table>
<input type="submit" value="savedata" class='savedata' id='savedata'>
</form>
</div>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $("#controllers").on('change', function() {
        if ($("#controllers").val()) {
            $.ajax({

                type: 'POST',

                url: "{{url('./admin/controllersactions')}}",

                //data:{name:name, password:password, email:email},
                data: {
                    _token: '{{csrf_token()}}',
                    'controller': this.value
                },

                success: function(data) {
                    $('.pretable').html("");
                    //console.log(data.roles);
                    $.each(data.actions, function(index, value) {
                        $('.pretable').append('<input type="hidden" name="pre[]" value="' + value.id + '"/>');
                    });
                    $.each(data.actions, function(index, value) {
                        //splite the name
                        var sName = value.name.split("_");
                        $('.pretable').append('<div class="position-relative row form-group text-center hearedFunction"><label for="' + sName[1] + '" class="col-sm-2 col-form-label">' + sName[1] + '</label>');
                        //$('.pretable').append('<td>');
                        $.each(data.roles, function(index, subvalue) {
                            var pFound = false;
                            $.each(subvalue.permissions, function(index, subsub) {
                                if (subsub.id == value.id) {
                                    pFound = true;
                                    return;
                                }

                            });
                            if (pFound)
                                $('.pretable').append('<div class="col-md-3 fub"><div class="position-relative row form-group text-center"><label for="exampleEmail" class="col-md-10"col-form-label">' + subvalue.name + '</label><div class="col-sm-2"><div class="position-relative row form-group"><input type="checkbox" label="admin" id="roles" name="roles[' + subvalue.id + '][' + value.id + ']" checked value="' + value.id + '"/></div>  </div></div>');
                            else
                                $('.pretable').append('<div class="col-md-3 fub"><div class="position-relative row form-group text-center"><label for="exampleEmail" class="col-md-10" col-form-label">' + subvalue.name + '</label><div class="col-sm-2"><div class="position-relative row form-group"><input type="checkbox"  label="admin" id="roles" name="roles[' + subvalue.id + '][' + value.id + ']" value="' + value.id + '"/></div> </div> </div>');
                                // $('.pretable').append("<hr>");
                        });

                    });
                    
                    /*$("#city").append("<option value>City</option>");
                    $.each(data,function(index,value){
                        $("#city").append("<option value='"+value.id+"'>"+value.title+"</option>")
                    })*/

                }

            });
        }
    });

    //saving data
    $('#savedata').on('click', function(e) {
        var array = [];
        $("input:checkbox[id=roles]:checked").each(function() {
            array.push({
                name: $(this).attr('name'),
                value: $(this).val(),
            });
        });
        console.log(array);
    })
</script>
@endsection