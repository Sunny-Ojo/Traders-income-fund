@extends('layouts.nav')
@section('title', 'Contact us')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header text-center text-white">
                    <h4>Contact Us</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('sendContactMessage') }}" method="post" role="form">
                        <div class="form-group">
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="name"
                                placeholder="Your Name" />
                            @error('name')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror </div>
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" {{ old('email') }}
                                placeholder="Your Email" />
                            @error('email')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" id="subject"
                                placeholder="Subject" />
                            @error('subject')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5"
                                placeholder="Message">{{ old('message') }}</textarea>
                            @error('message')
                            <li class="text-danger">{{ $message }}</li>
                            @enderror
                        </div>

                        <button class="btn btn-success btn-block" type="submit">Send
                            Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection
