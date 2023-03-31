<style>
    /* loader */
    .loader-container {
        width: 100%;
        height: 100vh;
        position: fixed;
        background: #222b32;
        z-index: 999999;
        left: 0;
        top: 0;
    }

    .loader-container .icon img {
        display: block;
        width: 150px;

        margin: 0 auto;
        object-fit: cover;
        margin-top: 200px;

    }

    .loader {
        width: 70px;
        height: 70px;
        display: block;
        margin: 150px auto;
        /* position: absolute; */
        /* left: 50%;
top: 40%; */
        border: 3px dotted #FFF;
        border-style: solid solid dotted dotted;
        border-radius: 50%;
        position: relative;
        box-sizing: border-box;
        animation: rotation 2s linear infinite;
        /* transform: translate(-50% ,-50%);
-webkit-transform: translate(-50% ,-50%);
-moz-transform: translate(-50% ,-50%);
-ms-transform: translate(-50% ,-50%);
-o-transform: translate(-50% ,-50%); */
    }

    .loader::after {
        content: '';
        box-sizing: border-box;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        border: 3px dotted #FF3D00;
        border-style: solid solid dotted;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        animation: rotationBack 1s linear infinite;
        transform-origin: center center;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes rotationBack {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(-360deg);
        }
    }


    /* loader */
</style>


<div class="loader-container">
    <div class="icon">
        <img src="{{ asset('uploads/app/logo.png') }}">
    </div>
    <span class="loader"></span>
</div>
