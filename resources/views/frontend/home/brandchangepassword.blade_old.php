@extends('frontend.layout.frontend_template')

@section('content')
<!-- jQuery Form Validation code -->
<script>
  
  // When the browser is ready...
  $( document ).ready(function(){

    $.validator.addMethod("notequalto", function(value, element, param) {
     return this.optional(element) || value != $(param).val();
    }, "Password and Old Password should not match...");


    $("#change_mem_form").validate({

       rules: {
                old_password: "required",
                password: {
                            required: true,
                            minlength:6,
                            notequalto:"#old_password"
                        },
                conf_pass: {
                  equalTo: "#password"
                }
            },
            messages: {
                old_password: "Please enter old password",
                password: {
                        required:"Please enter current password",
                        minlength:"Please enter minimum 6 character"
                },
               conf_pass: "Please enter the same value again"
      }

        
    });

  });
  
</script>

    

  
   <div class="brand_login">
        <div class="login_cont">
            <div class="log_inner text-center">
                <h2 class="wow fadeInDown">Get Mixin’</h2>              
                
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! Session::get('error') !!}</strong>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! Session::get('success') !!}</strong>
                    </div>
                @endif
                
                {!! Form::open(array('url' => 'brandChangePass','method'=>'POST','id' =>'change_mem_form')) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="tot_formlog clearfix">
                        <div class="input-group wow slideInLeft md15">
                        {!! Form::password('old_password',array('class'=>'form-control','id'=>'old_password','placeholder'=>'Old Password')) !!}
                          <span class="input-group-addon glyphicon glyphicon-user" id="basic-addon2"></span>
                        </div>
                        <div class="input-group wow slideInRight md30">
                          {!! Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>'Current Password')) !!}
                          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon3"></span>
                        </div>
                        <div class="input-group wow slideInRight md30">
                         {!! Form::password('conf_pass',array('class'=>'form-control', 'id'=>'conf_pass','placeholder'=>'Confirm Password')) !!}
                          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon3"></span>
                        </div>                       
                          {!! Form::submit('Save', ['class' => 'wow fadeInUp btn btn-default sub_btn']) !!}     
                    </div>
              {!! Form::close() !!}     
            </div>
        </div>
    </div>

              

@endsection

