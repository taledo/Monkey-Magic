@extends('layouts.common')

@section('title')
	Monkey Business
@stop

@section('body-class')
	home
@stop

@section('body')



        <?php 
            // variable is set in HomeController@postForm
            if (Session::has('thanks')) {
                echo '<div class="thanks"><p>Thanks for submitting this form!</p>We will get back to you shortly.</div>';
            }
        ?>

        {{ Form::open(array('url' => '/')) }}

         <fieldset>
            <!-- label input(id, value, attributes) -->
            {{ Form::label('fname', 'First Name') . Form::text('fname', Input::old('field1'), array('required' => 'required') ) }}
            <div class="error"><?php echo $errors->first('fname'); ?></div>

            {{ Form::label('sname', 'Surname') . Form::text('sname', Input::old('field2'), array('required' => 'required') ) }}
            <div class="error"><?php echo $errors->first('sname'); ?></div>

            {{ Form::label('email', 'Email') . Form::text('email', Input::old('email'), array('required' => 'required') ) }}
            <div class="error"><?php echo $errors->first('email'); ?></div>

            {{ Form::label('phone', 'Daytime contact number') . Form::text('phone', Input::old('phone'), array('required' => 'required') ) }}
            <div class="error"><?php echo $errors->first('phone'); ?></div>
        </fieldset>

        <fieldset>
            {{ Form::label('address', 'Address') . Form::text('address', Input::old('address'), array('required' => 'required') ) }}
            <div class="error"><?php echo $errors->first('address'); ?></div>
            {{ Form::label('suburb', 'Suburb') . Form::text('suburb', Input::old('suburb'), array('required' => 'required') ) }}
            <div class="error"><?php echo $errors->first('suburb'); ?></div>


            {{ Form::label('state', 'State') . Form::select('state', array(
                    '' => '',
                    'ACT' => 'ACT',
                    'NSW' => 'NSW',
                    'NT' => 'NT',
                    'QLD' => 'QLD',
                    'SA' => 'SA',
                    'TAS' => 'TAS',
                    'VIC' => 'VIC',
                    'WA' => 'WA'
                ), null, array('required' => 'required'))
            }}
            {{ Form::label('postcode', 'Postcode') . Form::text('postcode', Input::old('postcode'), array('required' => 'required') ) }}
        </fieldset>


        <fieldset>
            {{ Form::label('subject', 'Enquiry Type') . Form::select('subject', array(
                    '' => '',
                    'General' => 'General enquiry',
                    'Enquiry' => 'Product feedback or enquiry',
                    'Complaint' => 'Product complaint'
                ), null, array('required' => 'required'))
            }}
            {{ Form::label('pname', 'Product name') . Form::text('pname', Input::old('pname') ) }}
            {{ Form::label('psize', 'Product size') . Form::text('psize', Input::old('psize') ) }}
            {{ Form::label('useby', 'Use-by date') . Form::text('useby', Input::old('useby') ) }}
            {{ Form::label('batch', 'Batch code') . Form::text('batch', Input::old('batch') ) }}
            {{ Form::label('enquiry', 'Enquiry') . Form::textarea('enquiry', Input::old('enquiry') ) }}
            {{ Form::submit('Submit', array('class' => 'btn')) }}


        </fieldset>

        {{ Form::token() . Form::close() }}
@stop


