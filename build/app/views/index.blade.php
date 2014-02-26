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
                echo '<div class="thanks">Thanks for submitting this form! We will get back to you shortly.</div>';
            }
        ?>


        <?php //Any errors? ?>
        @if($errors->any())
          <ul class="errors">
              @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
              @endforeach
          </ul>
        @endif
     

        {{ Form::open(array('url' => '/')) }}

         <fieldset>
            <!-- label input(id, value, attributes) -->
            {{ Form::label('fname', 'First name *') . Form::text('fname', Input::old('field1'), array('required' => 'required') ) }}
            {{ Form::label('sname', 'Surname *') . Form::text('sname', Input::old('field2'), array('required' => 'required') ) }}
            {{ Form::label('email', 'Email address *') . Form::text('email', Input::old('email'), array('required' => 'required') ) }}
            {{ Form::label('phone', 'Daytime contact number *') . Form::text('phone', Input::old('phone'), array('required' => 'required') ) }}
        </fieldset>

        <fieldset>
            {{ Form::label('address', 'Address *') . Form::text('address', Input::old('address'), array('required' => 'required') ) }}
            {{ Form::label('suburb', 'Suburb *') . Form::text('suburb', Input::old('suburb'), array('required' => 'required') ) }}
            {{ Form::label('state', 'State *') . Form::select('state', array(
                    '' => '-- Select --',
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
            {{ Form::label('postcode', 'Postcode *') . Form::text('postcode', Input::old('postcode'), array('required' => 'required') ) }}
        </fieldset>


        <fieldset>
            {{ Form::label('subject', 'Enquiry type *') . Form::select('subject', array(
                    '' => '-- Select --',
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


