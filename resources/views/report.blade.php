@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="bg-light m-4 p-4">
                <p class="lead">
                    If you feel as though someone is in breach of the <a href="https://github.com/zatech/code-of-conduct">code of conduct</a>, is making you feel unsafe or would like to make a report the admin team anonymously please do so in the text field below.
                </p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-7 col-xl-5">
            @if ($received)
                <div class="alert alert-primary" role="alert">
                    Your report has been received!
                </div>
            @else
                <p>
                    Try to include as much detail and context as possible, such as links to specific messages etc.
                </p>
            @endif

            <hr>

            {{ Form::errors() }}
            {{ Form::open([ 'route' => 'report:post', 'id' => 'jsFormSubmit', ]) }}
                <div class="mb-4">
                    {{ Form::bsTextarea('report', null, [ 'rows' => 8, 'autofocus' => true, 'required' => true, ]) }}
                </div>

                <div class="d-grid">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::displaySubmit('jsFormSubmit', 'Submit', [
                        'class' => 'btn btn-primary',
                    ]) !!}
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
