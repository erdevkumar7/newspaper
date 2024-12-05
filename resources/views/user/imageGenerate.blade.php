@extends('user.layout')
@section('page_content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 text-center" style="max-width: 500px">
            <div class="col-xl-12">
                <h3 class="my-4">"MAAN" Image Creator</h3>


                <div id="tem-img-box">
                    <div>
                        <img src="{{ asset('public/images/allumni_img/temp_profile.png') }}"
                            style="width: 200px; height:200px">
                    </div>
                    {{-- <button class="btn btn-primary">Select Image</button> --}}
                    <input type="file" id="uploadImage" accept="image/*" onchange="generateImage()" />
                </div>

                <div>
                    <canvas id="canvas" style="display: none; border: 1px solid #ccc;"></canvas>
                    <button id="downloadBtn" class="btn btn-primary" style="display: none;"
                        onclick="downloadImage()">Download
                    </button>
                </div>
            </div>
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

                        // Show canvas, download button, and share button
                        canvas.style.display = 'block';
                        downloadBtn.style.display = 'inline-block';

                        const tempBox = document.getElementById('tem-img-box');
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
    </script>


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
@endsection
