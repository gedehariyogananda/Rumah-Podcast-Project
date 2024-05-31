$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const display = document.querySelector('.display');
const controllerWrapper = document.querySelector('.controllers');
const uploadButton = document.getElementById('uploadButton');

const State = ['Initial', 'Record', 'Download'];
let stateIndex = 0;
let mediaRecorder, chunks = [], audioURL = '';

// mediaRecorder setup for audio
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    console.log('mediaDevices supported..');

    navigator.mediaDevices.getUserMedia({
        audio: true
    }).then(stream => {
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = (e) => {
            chunks.push(e.data);
        };

        mediaRecorder.onstop = () => {
            const blob = new Blob(chunks, { 'type': 'audio/mp3; codecs=opus' });
            chunks = [];
            audioURL = window.URL.createObjectURL(blob);
            application(2); // Move to 'Download' state after stopping
        };
    }).catch(error => {
        console.log('Following error has occurred : ', error);
    });
} else {
    stateIndex = '';
    application(stateIndex);
}

const clearDisplay = () => {
    display.textContent = '';
};

const clearControls = () => {
    controllerWrapper.textContent = '';
};

const record = () => {
    stateIndex = 1;
    chunks = []; // Reset chunks for each recording session
    mediaRecorder.start();
    application(stateIndex);
};

const stopRecording = () => {
    stateIndex = 2;
    mediaRecorder.stop();
};

const uploadAudio = async () => {
    try {
        // Fetch the Blob from the audioURL
        const response = await fetch(audioURL);
        const blob = await response.blob();

        // Convert Blob to File (optional, depending on backend requirements)
        const file = new File([blob], 'audio.mp3', { type: 'audio/mp3' });

        // Create FormData and append the file
        const formData = new FormData();
        formData.append('audio', file);

        $.ajax({
            url: '/add-podcast',
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from automatically transforming the data into a query string
            contentType: false, // Set the content type to false to let the browser set it to multipart/form-data
            success: function(response) {
                console.log('Upload successful:', response);
                window.location.href = '/set-podcast/recording/' + response.idRecording;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Upload failed:', textStatus, errorThrown);
            }
        });
    } catch (error) {
        console.error('Error uploading audio:', error);
    }
};

const downloadAudio = () => {
    const downloadLink = document.createElement('a');
    downloadLink.href = audioURL;
    downloadLink.setAttribute('download', 'audio');
    downloadLink.click();
};

const addButton = (id, funString, text, btnClass = 'btn btn-primary btn-sm', iconClass = '') => {
    const btn = document.createElement('button');
    btn.id = id;
    btn.setAttribute('onclick', funString);
    btn.className = btnClass;

    if (iconClass) {
        const icon = document.createElement('i');
        icon.className = iconClass;
        icon.style.marginRight = '5px';
        btn.appendChild(icon);
    }

    const textNode = document.createTextNode(text);
    btn.appendChild(textNode);
    controllerWrapper.append(btn);
};

const addMessage = (text) => {
    const msg = document.createElement('p');
    msg.textContent = text;
    msg.style.textAlign = 'center';
    msg.style.marginBottom = '20px';
    display.append(msg);
};

const addAudio = () => {
    const audio = document.createElement('audio');
    audio.controls = true;
    audio.src = audioURL;
    audio.style.width = '180px';
    audio.style.marginTop = '20px';
    display.append(audio);
};

const application = (index) => {
    switch (State[index]) {
        case 'Initial':
            clearDisplay();
            clearControls();
            addButton('record', 'record()', 'Start Recording', 'btn btn-primary btn-sm', 'fa fa-microphone');
            uploadButton.style.display = 'none'; // Hide upload button initially
            break;

        case 'Record':
            clearDisplay();
            clearControls();
            addMessage('Recording...');
            addButton('stop', 'stopRecording()', 'Stop Recording', 'btn btn-danger btn-sm', 'fa fa-stop');
            break;

        case 'Download':
            clearControls();
            clearDisplay();
            addAudio();
            addButton('record', 'record()', 'Record Again', 'btn btn-primary btn-sm', 'fa fa-redo');
            addButton('download', 'downloadAudio()', 'Download Recording', 'btn btn-danger btn-sm', 'fa fa-download');
            uploadButton.style.display = 'inline-block'; // Show upload button after recording
            break;

        default:
            clearControls();
            clearDisplay();
            addMessage('Your browser does not support mediaDevices');
            break;
    }
};

application(stateIndex);
