@extends('layout.master_main')
@section('name_fitur', 'Recording Podcast')

@push('styling')
<style>
    .recording-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .display {
        margin-bottom: 20px;
        text-align: center;
    }

    .controllers {
        display: flex;
        gap: 10px;
    }

    .controllers button {
        width: 150px;
        padding: 10px;
        font-size: 16px;
    }

    .controllers button .fa {
        margin-right: 5px;
    }

    .upload-btn {
        display: none;
        margin-top: 20px;
        width: 180px;
        padding: 10px;
        font-size: 16px;
    }

    audio {
        margin-top: 20px;
    }
</style>
@endpush

@section('content')
<div class="container recording-container">
    <div class="display"></div>

    <div class="controllers">
        <button class="btn btn-primary btn-sm" id="record" onclick="record()">
            <i class="fa fa-microphone"></i> Start Recording
        </button>
    </div>
    <br>
    <button class="btn btn-success btn-sm upload-btn" id="uploadButton" onclick="uploadAudio()">
        <i class="fa fa-upload"></i>Upload Podcast!
    </button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/vrecorder.js') }}"></script>
@endsection