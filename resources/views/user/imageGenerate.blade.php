@extends('user.layout')
@section('page_content')
    {{-- <div class="container d-flex justify-content-center align-items-center  ">
        <div class="card p-4 text-center my-4" style="max-width: 500px">
            <div class="col-xl-12">
                <h3 class="my-2">"MAAN" Image Creator</h3>

                <div id="tem-img-box">
                    <div class="my-4">
                        <img src="{{ asset('public/images/allumni_img/temp_profile.png') }}"
                            style="width: 200px; height:200px">
                    </div>
                    <button class="btn btn-primary my-2" onclick="triggerFileInput()">Select Image</button>
                    <input type="file" id="uploadImage" accept="image/*" onchange="generateImage()"
                        style="display: none;" />
                </div>

                <div id="canvasImgBox" style="display: none">
                    <div class="my-4">
                        <canvas id="canvas" style=" border: 1px solid #ccc;"></canvas>
                    </div>
                    <button class="btn btn-primary my-2" id="downloadBtn" onclick="downloadImage()">Download
                    </button>
                    <button id="back-btn" class="btn my-2" onclick="triggerFileInput()" style=" background: #ffc107">
                        Create New
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function triggerFileInput() {
            document.getElementById('uploadImage').click(); // Programmatically click the hidden input
        }

        function generateImage() {
            const canvasImgBox = document.getElementById('canvasImgBox');
            const tempBox = document.getElementById('tem-img-box');
            const fileInput = document.getElementById('uploadImage');
            const canvas = document.getElementById('canvas');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                const ctx = canvas.getContext('2d');
                const img = new Image();

                reader.onload = function(e) {
                    img.onload = function() {
                        const size = 200; // Canvas size
                        const radius = size / 2; // Circle radius
                        const textRadius = radius - 20; // Text radius (inside the circle)
                        canvas.width = size;
                        canvas.height = size;
                        // Clear the canvas
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        // Clip the canvas to make its content circular
                        ctx.beginPath();
                        ctx.arc(radius, radius, radius, 0, Math.PI * 2, true);
                        ctx.closePath();
                        ctx.clip();
                        // Draw the uploaded image onto the circular canvas
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                        // Add text ("I am MAAN") along the circular path
                        ctx.font = 'bold 20px Arial';
                        ctx.fillStyle = '#ffc107';
                        ctx.textAlign = 'center';

                        const text = 'I AM MAAN'; // Text to display
                        const angleStart = Math.PI; // Start angle (180 degrees)
                        const angleEnd = 1.5 * Math.PI; // End angle (360 degrees)
                        const angleStep = (angleEnd - angleStart) / text.length;

                        text.split('').forEach((char, i) => {
                            const angle = angleStart + i * angleStep; // Angle for each character
                            const x = radius + textRadius * Math.cos(angle); // X position
                            const y = radius + textRadius * Math.sin(angle); // Y position
                            ctx.save();
                            ctx.translate(x, y);
                            ctx.rotate(angle + Math.PI / 2); // Rotate to align with the arc
                            ctx.fillText(char, 0, 0);
                            ctx.restore();
                        });

                        // Show canvas, and hide TempBox
                        canvasImgBox.style.display = 'block'                      
                        tempBox.style.display = 'none';
                    };
                    img.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);

            } else {
                alert('Please select an image to upload.');
            }
        }


        function downloadImage() {
            const canvas = document.getElementById('canvas');
            const link = document.createElement('a');
            link.download = 'I_am_MAAN.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        }
    </script> --}}


    {{-- <div class="container vh-100">
        <div class="col-xl-12 my-4 text-center">
           
            <h3 class="my-4">"I AM MAAN" Image Creator</h3>
            <input type="file" id="uploadImage" accept="image/*" onchange="generateImage()" />
            <canvas class="my-4" id="canvas" style="display: none; border: 1px solid #ccc;"></canvas>
            <button id="downloadBtn" class="btn btn-primary my-2" style="display: none;" onclick="downloadImage()">Download</button>
       
        </div>
    </div>

    <script>
        function generateImage() {
            const fileInput = document.getElementById('uploadImage');
            const canvas = document.getElementById('canvas');
            const downloadBtn = document.getElementById('downloadBtn');
    
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                const ctx = canvas.getContext('2d');
                const userImg = new Image();
                const defaultImg = new Image();
    
                // Load the default image from the server
                defaultImg.src = "{{ asset('public/images/allumni_img/maan-logo.jpg') }}"; // Replace with your server path
    
                defaultImg.onload = function () {
                    const canvasSize = 200; // Fixed canvas size
                    canvas.width = canvasSize;
                    canvas.height = canvasSize;
    
                    reader.onload = function (e) {
                        userImg.onload = function () {
                            // Draw the default background image
                            ctx.drawImage(defaultImg, 0, 0, canvas.width, canvas.height);
    
                            // Draw the user's uploaded image
                            const userImgSize = 100; // Size of the user's image
                            const userImgX = (canvas.width - userImgSize) / 2; // Center X
                            const userImgY = 100; // Position Y
                            ctx.drawImage(userImg, userImgX, userImgY, userImgSize, userImgSize);
    
                            // Add "I AM MAAN" text
                            ctx.font = 'bold 30px Arial';
                            ctx.fillStyle = 'blue';
                            ctx.textAlign = 'center';
                            ctx.fillText('I AM MAAN', canvas.width / 2, canvas.height - 50);
    
                            // Show the canvas and download button
                            canvas.style.display = 'block';
                            downloadBtn.style.display = 'inline-block';
                        };
    
                        userImg.src = e.target.result; // Load the user's uploaded image
                    };
    
                    reader.readAsDataURL(fileInput.files[0]); // Read the uploaded file
                };
            } else {
                alert('Please select an image to upload.');
            }
        }
    
        function downloadImage() {
            const canvas = document.getElementById('canvas');
            const link = document.createElement('a');
            link.download = 'I_AM_MAAN.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
        }
    </script> --}}


    <link rel="stylesheet" href="{{ asset('/public/mytheme/assets/vendor/preview-croper/cropper.min.css') }}" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" /> --}}
    <script src="{{ asset('/public/mytheme/assets/vendor/preview-croper/cropper.min.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script> --}}

    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 text-center my-4 select-profile">
            <div class="col-xl-12">
                <h3 class="my-2">"NAVOTSAV-3.0" Image Creator</h3>

                <!-- Temp Image Box -->
                <div id="tempBox" class="my-2" style="border: 1px solid #ccc;">
                    <img src="{{ asset('public/images/allumni_img/maan_dummy.png') }}" width="100%" height="100%">
                </div>

                <!-- Cropper Section -->
                <div id="cropperBox" class="my-2" style="display: none;">
                    <img id="previewImage" style="max-width: 100%;" />
                    <button class="btn btn-success my-2" onclick="cropImage()">Crop and Apply</button>
                </div>

                <!-- Canvas Section -->
                <div id="canvasBox" style="display: none;">
                    <canvas id="canvas"
                        style="display: block; border: 1px solid #ccc; width: 100%; height: 100%"></canvas>
                </div>

                <div class="profiles-sec">
                    <button id="selectBtn" class="btn btn-primary my-2" onclick="triggerFileInput()">Select Profile
                        Image</button>
                    <a href="{{ route('user.imageGenerate') }}"><button id="createNewBtn" class="btn btn-primary my-2"
                            style="display: none;">Create New</button></a>
                    <button id="downloadBtn" class="btn btn-success" style="display: none;"
                        onclick="downloadImage()">Download</button>
                </div>

                <input type="file" id="uploadProfile" accept="image/*" style="display: none;"
                    onchange="previewProfileImage()" />
            </div>
        </div>
    </div>

    <script>
        let cropper; // To hold the cropper instance
        const dummyProfileArea = {
            x: 215,
            y: 70,
            radius: 70, // Adjusted for circular profile area
        };

        function triggerFileInput() {
            document.getElementById("uploadProfile").click();
        }

        function previewProfileImage() {
            const fileInput = document.getElementById("uploadProfile");
            const previewImage = document.getElementById("previewImage");
            const cropperBox = document.getElementById("cropperBox");
            const tempBox = document.getElementById("tempBox");

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    cropperBox.style.display = "block";
                    tempBox.style.display = "none";
                    document.getElementById('selectBtn').style.display = "none"
                    // Initialize Cropper
                    cropper = new Cropper(previewImage, {
                        aspectRatio: 1, // Circular crop (maintains square selection)
                        viewMode: 1,
                    });
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function cropImage() {
            const canvas = document.getElementById("canvas");
            const ctx = canvas.getContext("2d");
            const bigImage = new Image();

            // Get cropped image data
            const croppedDataURL = cropper.getCroppedCanvas({
                width: dummyProfileArea.radius * 2, // Ensure the cropped image fits the dummy profile area
                height: dummyProfileArea.radius * 2,
            }).toDataURL();

            // Load the dummy background image
            bigImage.src = "{{ asset('public/images/allumni_img/maan_dummy.png') }}";
            bigImage.onload = () => {
                // Set high resolution for canvas
                canvas.width = bigImage.width * 2;
                canvas.height = bigImage.height * 2;
                canvas.style.width = `${bigImage.width}px`;
                canvas.style.height = `${bigImage.height}px`;
                ctx.scale(2, 2);

                // Draw the bigger image
                ctx.drawImage(bigImage, 0, 0, bigImage.width, bigImage.height);

                const profileImage = new Image();
                profileImage.src = croppedDataURL;
                profileImage.onload = () => {
                    // Save the current context state
                    ctx.save();

                    // Create a circular clipping path
                    ctx.beginPath();
                    ctx.arc(
                        dummyProfileArea.x + dummyProfileArea.radius,
                        dummyProfileArea.y + dummyProfileArea.radius,
                        dummyProfileArea.radius,
                        0,
                        Math.PI * 2
                    );
                    ctx.closePath();
                    ctx.clip();

                    // Draw the cropped profile image
                    ctx.drawImage(
                        profileImage,
                        dummyProfileArea.x,
                        dummyProfileArea.y,
                        dummyProfileArea.radius * 2,
                        dummyProfileArea.radius * 2
                    );

                    // Restore the context
                    ctx.restore();

                    // Show canvas and download button
                    document.getElementById("canvasBox").style.display = "inline-block";
                    document.getElementById("downloadBtn").style.display = "inline-block";
                    document.getElementById("createNewBtn").style.display = "inline-block";
                    document.getElementById("cropperBox").style.display = "none";
                };
            };
        }

        function downloadImage() {
            const canvas = document.getElementById("canvas");
            const link = document.createElement("a");
            link.download = "NAVOTSAV_Profile_Image.png";
            link.href = canvas.toDataURL("image/png"); // High-resolution image export
            link.click();
        }
    </script>
@endsection
