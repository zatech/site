@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="bg-light m-4 p-4">
                <h2>Welcome!</h2>
                <p class="lead">
                    {{ config('app.name') }} is a community for those working in and around the South African tech community to gather, share and learn from each other.
                </p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-lg-7 col-xl-5">
            <p>
                By joining you agree to abide by the <a href="https://github.com/zatech/code-of-conduct">Code of Conduct</a>. Please take a moment to read it.
            </p>

            <p>
                The group is intended to be high signal, low noise. Think of it as an overlapping series of professional groups rather than IRC in the 90s.
            </p>

            <p>
                Be kind. Don't be snarky. Have curious conversation; don't cross-examine. Comments should get more thoughtful and substantive, not less, as a topic gets more divisive.
            </p>

            <hr>

            @if ($sent)
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Awww yeah!</h4>
                    <p>Your invite is on the way.</p>
                </div>
            @else
                {{ Form::errors() }}
                {{ Form::open([ 'route' => 'invite:post', 'id' => 'jsFormSubmit', ]) }}
                    {{ Form::bsEmail('email', null, [ 'placeholder' => 'Email', 'autofocus' => true, 'required' => true, ]) }}

                    <div class="my-2">
                        {{ Form::bsCheckbox('code-of-conduct', 'value', false, [ 'labelValue' => 'Did you read the Code of Conduct?', ]) }}
                    </div>

                    <div class="d-grid">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::displaySubmit('jsFormSubmit', 'Request Invite', [
                            'class' => 'btn btn-primary',
                        ]) !!}
                    </div>
                {{ Form::close() }}
            @endif
        </div>
    </div>
@endsection
