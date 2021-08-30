<style>
    body {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        height: 100vh;
        overflow: hidden;
        background: radial-gradient(circle at center, #19aaa9, #19aaa9 300px, #ffffff 300px);
    }

    body .chainwrap {
        width: 100%;
        height: 100%;
        position: absolute;
        overflow: hidden;
        left: 0;
        top: 0;
        max-width: 900px;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        left: 50%;
    }

    body .chainwrap:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 9;
        box-shadow: inset 0 0 50px 20px #fff;
    }

    body .chainwrap:before {
        content: "";
        position: absolute;
        width: 600px;
        height: 600px;
        top: calc(50% - 300px);
        left: calc(50% - 300px);
        box-shadow: 0 0 0 500px rgba(255, 255, 255, 0.9);
        border-radius: 100%;
        z-index: 9;
    }

    body h1 {
        z-index: 9;
        font-size: 30vmin;
        font-family: Futura;
        letter-spacing: -3.5vmin;
        color: #ee3e38;
        margin: 7.5vmin 0 0;
        font-weight: 900;
    }

    body h1 span {
        position: relative;
        margin: 0;
        display: inline-block;
        -webkit-animation: bounce 2s ease-in-out infinite alternate;
        animation: bounce 2s ease-in-out infinite alternate;
        text-shadow: 0.05px 0.0866px 0 #faa12d, 0.1px 0.17321px 0 #faa12d, 0.15px 0.25981px 0 #faa12d, 0.2px 0.34641px 0 #faa12d, 0.25px 0.43301px 0 #faa12d, 0.3px 0.51962px 0 #faa12d, 0.35px 0.60622px 0 #faa12d, 0.4px 0.69282px 0 #faa12d, 0.45px 0.77942px 0 #faa12d, 0.5px 0.86603px 0 #faa12d, 0.55px 0.95263px 0 #faa12d, 0.6px 1.03923px 0 #faa12d, 0.65px 1.12583px 0 #faa12d, 0.7px 1.21244px 0 #faa12d, 0.75px 1.29904px 0 #faa12d, 0.8px 1.38564px 0 #faa12d, 0.85px 1.47224px 0 #faa12d, 0.9px 1.55885px 0 #faa12d, 0.95px 1.64545px 0 #faa12d, 1px 1.73205px 0 #faa12d, 1.05px 1.81865px 0 #faa12d, 1.1px 1.90526px 0 #faa12d, 1.15px 1.99186px 0 #faa12d, 1.2px 2.07846px 0 #faa12d, 1.25px 2.16506px 0 #faa12d, 1.3px 2.25167px 0 #faa12d, 1.35px 2.33827px 0 #faa12d, 1.4px 2.42487px 0 #faa12d, 1.45px 2.51147px 0 #faa12d, 1.5px 2.59808px 0 #faa12d, 1.55px 2.68468px 0 #faa12d, 1.6px 2.77128px 0 #faa12d, 1.65px 2.85788px 0 #faa12d, 1.7px 2.94449px 0 #faa12d, 1.75px 3.03109px 0 #faa12d, 1.8px 3.11769px 0 #faa12d, 1.85px 3.20429px 0 #faa12d, 1.9px 3.2909px 0 #faa12d, 1.95px 3.3775px 0 #faa12d, 2px 3.4641px 0 #faa12d, 2.05px 3.5507px 0 #faa12d, 2.1px 3.63731px 0 #faa12d, 2.15px 3.72391px 0 #faa12d, 2.2px 3.81051px 0 #faa12d, 2.25px 3.89711px 0 #faa12d, 2.3px 3.98372px 0 #faa12d, 2.35px 4.07032px 0 #faa12d, 2.4px 4.15692px 0 #faa12d, 2.45px 4.24352px 0 #faa12d, 2.5px 4.33013px 0 #faa12d, 2.55px 4.41673px 0 #faa12d, 2.6px 4.50333px 0 #faa12d, 2.65px 4.58993px 0 #faa12d, 2.7px 4.67654px 0 #faa12d, 2.75px 4.76314px 0 #faa12d, 2.8px 4.84974px 0 #faa12d, 2.85px 4.93634px 0 #faa12d, 2.9px 5.02295px 0 #faa12d, 2.95px 5.10955px 0 #faa12d, 3px 5.19615px 0 #faa12d, 3.05px 5.28275px 0 #faa12d, 3.1px 5.36936px 0 #faa12d, 3.15px 5.45596px 0 #faa12d, 3.2px 5.54256px 0 #faa12d, 3.25px 5.62917px 0 #faa12d, 3.3px 5.71577px 0 #faa12d, 3.35px 5.80237px 0 #faa12d, 3.4px 5.88897px 0 #faa12d, 3.45px 5.97558px 0 #faa12d, 3.5px 6.06218px 0 #faa12d, 3.55px 6.14878px 0 #faa12d, 3.6px 6.23538px 0 #faa12d, 3.65px 6.32199px 0 #faa12d, 3.7px 6.40859px 0 #faa12d, 3.75px 6.49519px 0 #faa12d, 3.8px 6.58179px 0 #faa12d, 3.85px 6.6684px 0 #faa12d, 3.9px 6.755px 0 #faa12d, 3.95px 6.8416px 0 #faa12d, 4px 6.9282px 0 #faa12d, 4.05px 7.01481px 0 #faa12d, 4.1px 7.10141px 0 #faa12d, 4.15px 7.18801px 0 #faa12d, 4.2px 7.27461px 0 #faa12d, 4.25px 7.36122px 0 #faa12d, 4.3px 7.44782px 0 #faa12d, 4.35px 7.53442px 0 #faa12d, 4.4px 7.62102px 0 #faa12d, 4.45px 7.70763px 0 #faa12d, 4.5px 7.79423px 0 #faa12d, 4.55px 7.88083px 0 #faa12d, 4.6px 7.96743px 0 #faa12d, 4.65px 8.05404px 0 #faa12d, 4.7px 8.14064px 0 #faa12d, 4.75px 8.22724px 0 #faa12d, 4.8px 8.31384px 0 #faa12d, 4.85px 8.40045px 0 #faa12d, 4.9px 8.48705px 0 #faa12d, 4.95px 8.57365px 0 #faa12d, 5px 8.66025px 0 #faa12d;
    }

    @-webkit-keyframes bounce {
        from {
            -webkit-transform: rotate(-5deg) translateY(1vmin);
            transform: rotate(-5deg) translateY(1vmin);
        }

        to {
            -webkit-transform: rotate(5deg) translateY(-1vmin);
            transform: rotate(5deg) translateY(-1vmin);
        }
    }

    @keyframes bounce {
        from {
            -webkit-transform: rotate(-5deg) translateY(1vmin);
            transform: rotate(-5deg) translateY(1vmin);
        }

        to {
            -webkit-transform: rotate(5deg) translateY(-1vmin);
            transform: rotate(5deg) translateY(-1vmin);
        }
    }

    body h1 span:nth-of-type(1) {
        -webkit-animation-delay: -0.33333s;
        animation-delay: -0.33333s;
        -webkit-animation-duration: 1;
        animation-duration: 1;
    }

    body h1 span:nth-of-type(2) {
        -webkit-animation-delay: -0.66667s;
        animation-delay: -0.66667s;
        -webkit-animation-duration: 1.33333;
        animation-duration: 1.33333;
    }

    body h1 span:nth-of-type(3) {
        -webkit-animation-delay: -1s;
        animation-delay: -1s;
        -webkit-animation-duration: 1.5;
        animation-duration: 1.5;
    }

    body h1 span:nth-of-type(2) {
        color: transparent;
        text-shadow: none;
    }

    body h1 span:nth-of-type(2):before,
    body h1 span:nth-of-type(2):after {
        content: "0";
        position: absolute;
        top: -15vmin;
        left: 0;
        color: #ee3e38;
        text-shadow: 0.05px 0.0866px 0 #faa12d, 0.1px 0.17321px 0 #faa12d, 0.15px 0.25981px 0 #faa12d, 0.2px 0.34641px 0 #faa12d, 0.25px 0.43301px 0 #faa12d, 0.3px 0.51962px 0 #faa12d, 0.35px 0.60622px 0 #faa12d, 0.4px 0.69282px 0 #faa12d, 0.45px 0.77942px 0 #faa12d, 0.5px 0.86603px 0 #faa12d, 0.55px 0.95263px 0 #faa12d, 0.6px 1.03923px 0 #faa12d, 0.65px 1.12583px 0 #faa12d, 0.7px 1.21244px 0 #faa12d, 0.75px 1.29904px 0 #faa12d, 0.8px 1.38564px 0 #faa12d, 0.85px 1.47224px 0 #faa12d, 0.9px 1.55885px 0 #faa12d, 0.95px 1.64545px 0 #faa12d, 1px 1.73205px 0 #faa12d, 1.05px 1.81865px 0 #faa12d, 1.1px 1.90526px 0 #faa12d, 1.15px 1.99186px 0 #faa12d, 1.2px 2.07846px 0 #faa12d, 1.25px 2.16506px 0 #faa12d, 1.3px 2.25167px 0 #faa12d, 1.35px 2.33827px 0 #faa12d, 1.4px 2.42487px 0 #faa12d, 1.45px 2.51147px 0 #faa12d, 1.5px 2.59808px 0 #faa12d, 1.55px 2.68468px 0 #faa12d, 1.6px 2.77128px 0 #faa12d, 1.65px 2.85788px 0 #faa12d, 1.7px 2.94449px 0 #faa12d, 1.75px 3.03109px 0 #faa12d, 1.8px 3.11769px 0 #faa12d, 1.85px 3.20429px 0 #faa12d, 1.9px 3.2909px 0 #faa12d, 1.95px 3.3775px 0 #faa12d, 2px 3.4641px 0 #faa12d, 2.05px 3.5507px 0 #faa12d, 2.1px 3.63731px 0 #faa12d, 2.15px 3.72391px 0 #faa12d, 2.2px 3.81051px 0 #faa12d, 2.25px 3.89711px 0 #faa12d, 2.3px 3.98372px 0 #faa12d, 2.35px 4.07032px 0 #faa12d, 2.4px 4.15692px 0 #faa12d, 2.45px 4.24352px 0 #faa12d, 2.5px 4.33013px 0 #faa12d, 2.55px 4.41673px 0 #faa12d, 2.6px 4.50333px 0 #faa12d, 2.65px 4.58993px 0 #faa12d, 2.7px 4.67654px 0 #faa12d, 2.75px 4.76314px 0 #faa12d, 2.8px 4.84974px 0 #faa12d, 2.85px 4.93634px 0 #faa12d, 2.9px 5.02295px 0 #faa12d, 2.95px 5.10955px 0 #faa12d, 3px 5.19615px 0 #faa12d, 3.05px 5.28275px 0 #faa12d, 3.1px 5.36936px 0 #faa12d, 3.15px 5.45596px 0 #faa12d, 3.2px 5.54256px 0 #faa12d, 3.25px 5.62917px 0 #faa12d, 3.3px 5.71577px 0 #faa12d, 3.35px 5.80237px 0 #faa12d, 3.4px 5.88897px 0 #faa12d, 3.45px 5.97558px 0 #faa12d, 3.5px 6.06218px 0 #faa12d, 3.55px 6.14878px 0 #faa12d, 3.6px 6.23538px 0 #faa12d, 3.65px 6.32199px 0 #faa12d, 3.7px 6.40859px 0 #faa12d, 3.75px 6.49519px 0 #faa12d, 3.8px 6.58179px 0 #faa12d, 3.85px 6.6684px 0 #faa12d, 3.9px 6.755px 0 #faa12d, 3.95px 6.8416px 0 #faa12d, 4px 6.9282px 0 #faa12d, 4.05px 7.01481px 0 #faa12d, 4.1px 7.10141px 0 #faa12d, 4.15px 7.18801px 0 #faa12d, 4.2px 7.27461px 0 #faa12d, 4.25px 7.36122px 0 #faa12d, 4.3px 7.44782px 0 #faa12d, 4.35px 7.53442px 0 #faa12d, 4.4px 7.62102px 0 #faa12d, 4.45px 7.70763px 0 #faa12d, 4.5px 7.79423px 0 #faa12d, 4.55px 7.88083px 0 #faa12d, 4.6px 7.96743px 0 #faa12d, 4.65px 8.05404px 0 #faa12d, 4.7px 8.14064px 0 #faa12d, 4.75px 8.22724px 0 #faa12d, 4.8px 8.31384px 0 #faa12d, 4.85px 8.40045px 0 #faa12d, 4.9px 8.48705px 0 #faa12d, 4.95px 8.57365px 0 #faa12d, 5px 8.66025px 0 #faa12d;
    }

    body h1 span:nth-of-type(2):before {
        -webkit-clip-path: polygon(0 0, 200% 0, 200% 50%, 0 50%);
        clip-path: polygon(0 0, 200% 0, 200% 50%, 0 50%);
        text-shadow: -0.05px 0.0866px 0 #faa12d, -0.1px 0.17321px 0 #faa12d, -0.15px 0.25981px 0 #faa12d, -0.2px 0.34641px 0 #faa12d, -0.25px 0.43301px 0 #faa12d, -0.3px 0.51962px 0 #faa12d, -0.35px 0.60622px 0 #faa12d, -0.4px 0.69282px 0 #faa12d, -0.45px 0.77942px 0 #faa12d, -0.5px 0.86603px 0 #faa12d, -0.55px 0.95263px 0 #faa12d, -0.6px 1.03923px 0 #faa12d, -0.65px 1.12583px 0 #faa12d, -0.7px 1.21244px 0 #faa12d, -0.75px 1.29904px 0 #faa12d, -0.8px 1.38564px 0 #faa12d, -0.85px 1.47224px 0 #faa12d, -0.9px 1.55885px 0 #faa12d, -0.95px 1.64545px 0 #faa12d, -1px 1.73205px 0 #faa12d, -1.05px 1.81865px 0 #faa12d, -1.1px 1.90526px 0 #faa12d, -1.15px 1.99186px 0 #faa12d, -1.2px 2.07846px 0 #faa12d, -1.25px 2.16506px 0 #faa12d, -1.3px 2.25167px 0 #faa12d, -1.35px 2.33827px 0 #faa12d, -1.4px 2.42487px 0 #faa12d, -1.45px 2.51147px 0 #faa12d, -1.5px 2.59808px 0 #faa12d, -1.55px 2.68468px 0 #faa12d, -1.6px 2.77128px 0 #faa12d, -1.65px 2.85788px 0 #faa12d, -1.7px 2.94449px 0 #faa12d, -1.75px 3.03109px 0 #faa12d, -1.8px 3.11769px 0 #faa12d, -1.85px 3.20429px 0 #faa12d, -1.9px 3.2909px 0 #faa12d, -1.95px 3.3775px 0 #faa12d, -2px 3.4641px 0 #faa12d, -2.05px 3.5507px 0 #faa12d, -2.1px 3.63731px 0 #faa12d, -2.15px 3.72391px 0 #faa12d, -2.2px 3.81051px 0 #faa12d, -2.25px 3.89711px 0 #faa12d, -2.3px 3.98372px 0 #faa12d, -2.35px 4.07032px 0 #faa12d, -2.4px 4.15692px 0 #faa12d, -2.45px 4.24352px 0 #faa12d, -2.5px 4.33013px 0 #faa12d, -2.55px 4.41673px 0 #faa12d, -2.6px 4.50333px 0 #faa12d, -2.65px 4.58993px 0 #faa12d, -2.7px 4.67654px 0 #faa12d, -2.75px 4.76314px 0 #faa12d, -2.8px 4.84974px 0 #faa12d, -2.85px 4.93634px 0 #faa12d, -2.9px 5.02295px 0 #faa12d, -2.95px 5.10955px 0 #faa12d, -3px 5.19615px 0 #faa12d, -3.05px 5.28275px 0 #faa12d, -3.1px 5.36936px 0 #faa12d, -3.15px 5.45596px 0 #faa12d, -3.2px 5.54256px 0 #faa12d, -3.25px 5.62917px 0 #faa12d, -3.3px 5.71577px 0 #faa12d, -3.35px 5.80237px 0 #faa12d, -3.4px 5.88897px 0 #faa12d, -3.45px 5.97558px 0 #faa12d, -3.5px 6.06218px 0 #faa12d, -3.55px 6.14878px 0 #faa12d, -3.6px 6.23538px 0 #faa12d, -3.65px 6.32199px 0 #faa12d, -3.7px 6.40859px 0 #faa12d, -3.75px 6.49519px 0 #faa12d, -3.8px 6.58179px 0 #faa12d, -3.85px 6.6684px 0 #faa12d, -3.9px 6.755px 0 #faa12d, -3.95px 6.8416px 0 #faa12d, -4px 6.9282px 0 #faa12d, -4.05px 7.01481px 0 #faa12d, -4.1px 7.10141px 0 #faa12d, -4.15px 7.18801px 0 #faa12d, -4.2px 7.27461px 0 #faa12d, -4.25px 7.36122px 0 #faa12d, -4.3px 7.44782px 0 #faa12d, -4.35px 7.53442px 0 #faa12d, -4.4px 7.62102px 0 #faa12d, -4.45px 7.70763px 0 #faa12d, -4.5px 7.79423px 0 #faa12d, -4.55px 7.88083px 0 #faa12d, -4.6px 7.96743px 0 #faa12d, -4.65px 8.05404px 0 #faa12d, -4.7px 8.14064px 0 #faa12d, -4.75px 8.22724px 0 #faa12d, -4.8px 8.31384px 0 #faa12d, -4.85px 8.40045px 0 #faa12d, -4.9px 8.48705px 0 #faa12d, -4.95px 8.57365px 0 #faa12d, -5px 8.66025px 0 #faa12d;
        z-index: 9;
        margin-top: 2px;
        -webkit-transform-origin: 3.59vmin 50%;
        transform-origin: 3.59vmin 50%;
        -webkit-transform: rotateY(-180deg);
        transform: rotateY(-180deg);
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-animation: close 0.5s cubic-bezier(1, 0, 0, 1) 1 forwards;
        animation: close 0.5s cubic-bezier(1, 0, 0, 1) 1 forwards;
        -webkit-animation-delay: 4s;
        animation-delay: 4s;
    }

    @-webkit-keyframes close {
        to {
            -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
            text-shadow: 0.05px 0.0866px 0 #faa12d, 0.1px 0.17321px 0 #faa12d, 0.15px 0.25981px 0 #faa12d, 0.2px 0.34641px 0 #faa12d, 0.25px 0.43301px 0 #faa12d, 0.3px 0.51962px 0 #faa12d, 0.35px 0.60622px 0 #faa12d, 0.4px 0.69282px 0 #faa12d, 0.45px 0.77942px 0 #faa12d, 0.5px 0.86603px 0 #faa12d, 0.55px 0.95263px 0 #faa12d, 0.6px 1.03923px 0 #faa12d, 0.65px 1.12583px 0 #faa12d, 0.7px 1.21244px 0 #faa12d, 0.75px 1.29904px 0 #faa12d, 0.8px 1.38564px 0 #faa12d, 0.85px 1.47224px 0 #faa12d, 0.9px 1.55885px 0 #faa12d, 0.95px 1.64545px 0 #faa12d, 1px 1.73205px 0 #faa12d, 1.05px 1.81865px 0 #faa12d, 1.1px 1.90526px 0 #faa12d, 1.15px 1.99186px 0 #faa12d, 1.2px 2.07846px 0 #faa12d, 1.25px 2.16506px 0 #faa12d, 1.3px 2.25167px 0 #faa12d, 1.35px 2.33827px 0 #faa12d, 1.4px 2.42487px 0 #faa12d, 1.45px 2.51147px 0 #faa12d, 1.5px 2.59808px 0 #faa12d, 1.55px 2.68468px 0 #faa12d, 1.6px 2.77128px 0 #faa12d, 1.65px 2.85788px 0 #faa12d, 1.7px 2.94449px 0 #faa12d, 1.75px 3.03109px 0 #faa12d, 1.8px 3.11769px 0 #faa12d, 1.85px 3.20429px 0 #faa12d, 1.9px 3.2909px 0 #faa12d, 1.95px 3.3775px 0 #faa12d, 2px 3.4641px 0 #faa12d, 2.05px 3.5507px 0 #faa12d, 2.1px 3.63731px 0 #faa12d, 2.15px 3.72391px 0 #faa12d, 2.2px 3.81051px 0 #faa12d, 2.25px 3.89711px 0 #faa12d, 2.3px 3.98372px 0 #faa12d, 2.35px 4.07032px 0 #faa12d, 2.4px 4.15692px 0 #faa12d, 2.45px 4.24352px 0 #faa12d, 2.5px 4.33013px 0 #faa12d, 2.55px 4.41673px 0 #faa12d, 2.6px 4.50333px 0 #faa12d, 2.65px 4.58993px 0 #faa12d, 2.7px 4.67654px 0 #faa12d, 2.75px 4.76314px 0 #faa12d, 2.8px 4.84974px 0 #faa12d, 2.85px 4.93634px 0 #faa12d, 2.9px 5.02295px 0 #faa12d, 2.95px 5.10955px 0 #faa12d, 3px 5.19615px 0 #faa12d, 3.05px 5.28275px 0 #faa12d, 3.1px 5.36936px 0 #faa12d, 3.15px 5.45596px 0 #faa12d, 3.2px 5.54256px 0 #faa12d, 3.25px 5.62917px 0 #faa12d, 3.3px 5.71577px 0 #faa12d, 3.35px 5.80237px 0 #faa12d, 3.4px 5.88897px 0 #faa12d, 3.45px 5.97558px 0 #faa12d, 3.5px 6.06218px 0 #faa12d, 3.55px 6.14878px 0 #faa12d, 3.6px 6.23538px 0 #faa12d, 3.65px 6.32199px 0 #faa12d, 3.7px 6.40859px 0 #faa12d, 3.75px 6.49519px 0 #faa12d, 3.8px 6.58179px 0 #faa12d, 3.85px 6.6684px 0 #faa12d, 3.9px 6.755px 0 #faa12d, 3.95px 6.8416px 0 #faa12d, 4px 6.9282px 0 #faa12d, 4.05px 7.01481px 0 #faa12d, 4.1px 7.10141px 0 #faa12d, 4.15px 7.18801px 0 #faa12d, 4.2px 7.27461px 0 #faa12d, 4.25px 7.36122px 0 #faa12d, 4.3px 7.44782px 0 #faa12d, 4.35px 7.53442px 0 #faa12d, 4.4px 7.62102px 0 #faa12d, 4.45px 7.70763px 0 #faa12d, 4.5px 7.79423px 0 #faa12d, 4.55px 7.88083px 0 #faa12d, 4.6px 7.96743px 0 #faa12d, 4.65px 8.05404px 0 #faa12d, 4.7px 8.14064px 0 #faa12d, 4.75px 8.22724px 0 #faa12d, 4.8px 8.31384px 0 #faa12d, 4.85px 8.40045px 0 #faa12d, 4.9px 8.48705px 0 #faa12d, 4.95px 8.57365px 0 #faa12d, 5px 8.66025px 0 #faa12d;
        }
    }

    @keyframes close {
        to {
            -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg);
            text-shadow: 0.05px 0.0866px 0 #faa12d, 0.1px 0.17321px 0 #faa12d, 0.15px 0.25981px 0 #faa12d, 0.2px 0.34641px 0 #faa12d, 0.25px 0.43301px 0 #faa12d, 0.3px 0.51962px 0 #faa12d, 0.35px 0.60622px 0 #faa12d, 0.4px 0.69282px 0 #faa12d, 0.45px 0.77942px 0 #faa12d, 0.5px 0.86603px 0 #faa12d, 0.55px 0.95263px 0 #faa12d, 0.6px 1.03923px 0 #faa12d, 0.65px 1.12583px 0 #faa12d, 0.7px 1.21244px 0 #faa12d, 0.75px 1.29904px 0 #faa12d, 0.8px 1.38564px 0 #faa12d, 0.85px 1.47224px 0 #faa12d, 0.9px 1.55885px 0 #faa12d, 0.95px 1.64545px 0 #faa12d, 1px 1.73205px 0 #faa12d, 1.05px 1.81865px 0 #faa12d, 1.1px 1.90526px 0 #faa12d, 1.15px 1.99186px 0 #faa12d, 1.2px 2.07846px 0 #faa12d, 1.25px 2.16506px 0 #faa12d, 1.3px 2.25167px 0 #faa12d, 1.35px 2.33827px 0 #faa12d, 1.4px 2.42487px 0 #faa12d, 1.45px 2.51147px 0 #faa12d, 1.5px 2.59808px 0 #faa12d, 1.55px 2.68468px 0 #faa12d, 1.6px 2.77128px 0 #faa12d, 1.65px 2.85788px 0 #faa12d, 1.7px 2.94449px 0 #faa12d, 1.75px 3.03109px 0 #faa12d, 1.8px 3.11769px 0 #faa12d, 1.85px 3.20429px 0 #faa12d, 1.9px 3.2909px 0 #faa12d, 1.95px 3.3775px 0 #faa12d, 2px 3.4641px 0 #faa12d, 2.05px 3.5507px 0 #faa12d, 2.1px 3.63731px 0 #faa12d, 2.15px 3.72391px 0 #faa12d, 2.2px 3.81051px 0 #faa12d, 2.25px 3.89711px 0 #faa12d, 2.3px 3.98372px 0 #faa12d, 2.35px 4.07032px 0 #faa12d, 2.4px 4.15692px 0 #faa12d, 2.45px 4.24352px 0 #faa12d, 2.5px 4.33013px 0 #faa12d, 2.55px 4.41673px 0 #faa12d, 2.6px 4.50333px 0 #faa12d, 2.65px 4.58993px 0 #faa12d, 2.7px 4.67654px 0 #faa12d, 2.75px 4.76314px 0 #faa12d, 2.8px 4.84974px 0 #faa12d, 2.85px 4.93634px 0 #faa12d, 2.9px 5.02295px 0 #faa12d, 2.95px 5.10955px 0 #faa12d, 3px 5.19615px 0 #faa12d, 3.05px 5.28275px 0 #faa12d, 3.1px 5.36936px 0 #faa12d, 3.15px 5.45596px 0 #faa12d, 3.2px 5.54256px 0 #faa12d, 3.25px 5.62917px 0 #faa12d, 3.3px 5.71577px 0 #faa12d, 3.35px 5.80237px 0 #faa12d, 3.4px 5.88897px 0 #faa12d, 3.45px 5.97558px 0 #faa12d, 3.5px 6.06218px 0 #faa12d, 3.55px 6.14878px 0 #faa12d, 3.6px 6.23538px 0 #faa12d, 3.65px 6.32199px 0 #faa12d, 3.7px 6.40859px 0 #faa12d, 3.75px 6.49519px 0 #faa12d, 3.8px 6.58179px 0 #faa12d, 3.85px 6.6684px 0 #faa12d, 3.9px 6.755px 0 #faa12d, 3.95px 6.8416px 0 #faa12d, 4px 6.9282px 0 #faa12d, 4.05px 7.01481px 0 #faa12d, 4.1px 7.10141px 0 #faa12d, 4.15px 7.18801px 0 #faa12d, 4.2px 7.27461px 0 #faa12d, 4.25px 7.36122px 0 #faa12d, 4.3px 7.44782px 0 #faa12d, 4.35px 7.53442px 0 #faa12d, 4.4px 7.62102px 0 #faa12d, 4.45px 7.70763px 0 #faa12d, 4.5px 7.79423px 0 #faa12d, 4.55px 7.88083px 0 #faa12d, 4.6px 7.96743px 0 #faa12d, 4.65px 8.05404px 0 #faa12d, 4.7px 8.14064px 0 #faa12d, 4.75px 8.22724px 0 #faa12d, 4.8px 8.31384px 0 #faa12d, 4.85px 8.40045px 0 #faa12d, 4.9px 8.48705px 0 #faa12d, 4.95px 8.57365px 0 #faa12d, 5px 8.66025px 0 #faa12d;
        }
    }

    body h1 span:nth-of-type(2):after {
        -webkit-clip-path: polygon(0 100%, 100% 100%, 200% 50%, 0 50%);
        clip-path: polygon(0 100%, 100% 100%, 200% 50%, 0 50%);
        z-index: -1;
    }

    body .chain {
        position: absolute;
        width: 15px;
        height: 200%;
        border-radius: 10px;
        top: -50%;
        left: 50%;
        z-index: -1;
    }

    body .chain:nth-of-type(1) {
        -webkit-animation: wrap1 4s linear 1 forwards;
        animation: wrap1 4s linear 1 forwards;
        z-index: 3;
    }

    body .chain:nth-of-type(1):before,
    body .chain:nth-of-type(1):after {
        -webkit-filter: brightness(1.4);
        filter: brightness(1.4);
    }

    @-webkit-keyframes wrap1 {
        0% {
            -webkit-transform: rotate(24deg);
            transform: rotate(24deg);
        }

        99% {
            -webkit-transform: rotate(24deg);
            transform: rotate(24deg);
        }

        100% {
            -webkit-transform: rotate(24deg) scaleY(1.15);
            transform: rotate(24deg) scaleY(1.15);
        }
    }

    @keyframes wrap1 {
        0% {
            -webkit-transform: rotate(24deg);
            transform: rotate(24deg);
        }

        99% {
            -webkit-transform: rotate(24deg);
            transform: rotate(24deg);
        }

        100% {
            -webkit-transform: rotate(24deg) scaleY(1.15);
            transform: rotate(24deg) scaleY(1.15);
        }
    }

    body .chain:nth-of-type(1):before,
    body .chain:nth-of-type(1):after {
        background-image: radial-gradient(ellipse, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 5px, #420634 5px, #420634 8px, rgba(0, 0, 0, 0) 8px);
        -webkit-animation-delay: 3s;
        animation-delay: 3s;
    }

    body .chain:nth-of-type(1):after {
        width: 3px;
        height: 100%;
        left: calc(50% - 1.5px);
        background: repeating-linear-gradient(to bottom, #3d0630, #3d0630 15px, transparent 15px, transparent 30px);
        background-position: 50% 22.5px;
    }

    body .chain:nth-of-type(2) {
        -webkit-animation: wrap2 4s linear 1 forwards;
        animation: wrap2 4s linear 1 forwards;
        z-index: 4;
    }

    body .chain:nth-of-type(2):before,
    body .chain:nth-of-type(2):after {
        -webkit-filter: brightness(1.3);
        filter: brightness(1.3);
    }

    @-webkit-keyframes wrap2 {
        0% {
            -webkit-transform: rotate(48deg);
            transform: rotate(48deg);
        }

        99% {
            -webkit-transform: rotate(48deg);
            transform: rotate(48deg);
        }

        100% {
            -webkit-transform: rotate(48deg) scaleY(1.15);
            transform: rotate(48deg) scaleY(1.15);
        }
    }

    @keyframes wrap2 {
        0% {
            -webkit-transform: rotate(48deg);
            transform: rotate(48deg);
        }

        99% {
            -webkit-transform: rotate(48deg);
            transform: rotate(48deg);
        }

        100% {
            -webkit-transform: rotate(48deg) scaleY(1.15);
            transform: rotate(48deg) scaleY(1.15);
        }
    }

    body .chain:nth-of-type(2):before,
    body .chain:nth-of-type(2):after {
        background-image: radial-gradient(ellipse, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 5px, #460737 5px, #460737 8px, rgba(0, 0, 0, 0) 8px);
        -webkit-animation-delay: 1.5s;
        animation-delay: 1.5s;
    }

    body .chain:nth-of-type(2):after {
        width: 3px;
        height: 100%;
        left: calc(50% - 1.5px);
        background: repeating-linear-gradient(to bottom, #3d0630, #3d0630 15px, transparent 15px, transparent 30px);
        background-position: 50% 22.5px;
    }

    body .chain:nth-of-type(3) {
        -webkit-animation: wrap3 4s linear 1 forwards;
        animation: wrap3 4s linear 1 forwards;
        z-index: 1;
    }

    body .chain:nth-of-type(3):before,
    body .chain:nth-of-type(3):after {
        -webkit-filter: brightness(1.2);
        filter: brightness(1.2);
    }

    @-webkit-keyframes wrap3 {
        0% {
            -webkit-transform: rotate(72deg);
            transform: rotate(72deg);
        }

        99% {
            -webkit-transform: rotate(72deg);
            transform: rotate(72deg);
        }

        100% {
            -webkit-transform: rotate(72deg) scaleY(1.15);
            transform: rotate(72deg) scaleY(1.15);
        }
    }

    @keyframes wrap3 {
        0% {
            -webkit-transform: rotate(72deg);
            transform: rotate(72deg);
        }

        99% {
            -webkit-transform: rotate(72deg);
            transform: rotate(72deg);
        }

        100% {
            -webkit-transform: rotate(72deg) scaleY(1.15);
            transform: rotate(72deg) scaleY(1.15);
        }
    }

    body .chain:nth-of-type(3):before,
    body .chain:nth-of-type(3):after {
        background-image: radial-gradient(ellipse, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 5px, #4b073b 5px, #4b073b 8px, rgba(0, 0, 0, 0) 8px);
        -webkit-animation-delay: 1s;
        animation-delay: 1s;
    }

    body .chain:nth-of-type(3):after {
        width: 3px;
        height: 100%;
        left: calc(50% - 1.5px);
        background: repeating-linear-gradient(to bottom, #3d0630, #3d0630 15px, transparent 15px, transparent 30px);
        background-position: 50% 22.5px;
    }

    body .chain:nth-of-type(4) {
        -webkit-animation: wrap4 4s linear 1 forwards;
        animation: wrap4 4s linear 1 forwards;
        z-index: 5;
    }

    body .chain:nth-of-type(4):before,
    body .chain:nth-of-type(4):after {
        -webkit-filter: brightness(1.1);
        filter: brightness(1.1);
    }

    @-webkit-keyframes wrap4 {
        0% {
            -webkit-transform: rotate(96deg);
            transform: rotate(96deg);
        }

        99% {
            -webkit-transform: rotate(96deg);
            transform: rotate(96deg);
        }

        100% {
            -webkit-transform: rotate(96deg) scaleY(1.15);
            transform: rotate(96deg) scaleY(1.15);
        }
    }

    @keyframes wrap4 {
        0% {
            -webkit-transform: rotate(96deg);
            transform: rotate(96deg);
        }

        99% {
            -webkit-transform: rotate(96deg);
            transform: rotate(96deg);
        }

        100% {
            -webkit-transform: rotate(96deg) scaleY(1.15);
            transform: rotate(96deg) scaleY(1.15);
        }
    }

    body .chain:nth-of-type(4):before,
    body .chain:nth-of-type(4):after {
        background-image: radial-gradient(ellipse, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 5px, #50083f 5px, #50083f 8px, rgba(0, 0, 0, 0) 8px);
        -webkit-animation-delay: 0.75s;
        animation-delay: 0.75s;
    }

    body .chain:nth-of-type(4):after {
        width: 3px;
        height: 100%;
        left: calc(50% - 1.5px);
        background: repeating-linear-gradient(to bottom, #3d0630, #3d0630 15px, transparent 15px, transparent 30px);
        background-position: 50% 22.5px;
    }

    body .chain:nth-of-type(5) {
        -webkit-animation: wrap5 4s linear 1 forwards;
        animation: wrap5 4s linear 1 forwards;
        z-index: 1;
    }

    body .chain:nth-of-type(5):before,
    body .chain:nth-of-type(5):after {
        -webkit-filter: brightness(1);
        filter: brightness(1);
    }

    @-webkit-keyframes wrap5 {
        0% {
            -webkit-transform: rotate(120deg);
            transform: rotate(120deg);
        }

        99% {
            -webkit-transform: rotate(120deg);
            transform: rotate(120deg);
        }

        100% {
            -webkit-transform: rotate(120deg) scaleY(1.15);
            transform: rotate(120deg) scaleY(1.15);
        }
    }

    @keyframes wrap5 {
        0% {
            -webkit-transform: rotate(120deg);
            transform: rotate(120deg);
        }

        99% {
            -webkit-transform: rotate(120deg);
            transform: rotate(120deg);
        }

        100% {
            -webkit-transform: rotate(120deg) scaleY(1.15);
            transform: rotate(120deg) scaleY(1.15);
        }
    }

    body .chain:nth-of-type(5):before,
    body .chain:nth-of-type(5):after {
        background-image: radial-gradient(ellipse, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 5px, #540842 5px, #540842 8px, rgba(0, 0, 0, 0) 8px);
        -webkit-animation-delay: 0.6s;
        animation-delay: 0.6s;
    }

    body .chain:nth-of-type(5):after {
        width: 3px;
        height: 100%;
        left: calc(50% - 1.5px);
        background: repeating-linear-gradient(to bottom, #3d0630, #3d0630 15px, transparent 15px, transparent 30px);
        background-position: 50% 22.5px;
    }

    body .chain:nth-of-type(6) {
        -webkit-animation: wrap6 4s linear 1 forwards;
        animation: wrap6 4s linear 1 forwards;
        z-index: 10;
    }

    body .chain:nth-of-type(6):before,
    body .chain:nth-of-type(6):after {
        -webkit-filter: brightness(0.9);
        filter: brightness(0.9);
    }

    @-webkit-keyframes wrap6 {
        0% {
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }

        99% {
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }

        100% {
            -webkit-transform: rotate(144deg) scaleY(1.15);
            transform: rotate(144deg) scaleY(1.15);
        }
    }

    @keyframes wrap6 {
        0% {
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }

        99% {
            -webkit-transform: rotate(144deg);
            transform: rotate(144deg);
        }

        100% {
            -webkit-transform: rotate(144deg) scaleY(1.15);
            transform: rotate(144deg) scaleY(1.15);
        }
    }

    body .chain:nth-of-type(6):before,
    body .chain:nth-of-type(6):after {
        background-image: radial-gradient(ellipse, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 5px, #590946 5px, #590946 8px, rgba(0, 0, 0, 0) 8px);
        -webkit-animation-delay: 0.5s;
        animation-delay: 0.5s;
    }

    body .chain:nth-of-type(6):after {
        width: 3px;
        height: 100%;
        left: calc(50% - 1.5px);
        background: repeating-linear-gradient(to bottom, #3d0630, #3d0630 15px, transparent 15px, transparent 30px);
        background-position: 50% 22.5px;
    }

    body .chain:before,
    body .chain:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background-size: 15px 30px;
        -webkit-animation: wrap 0.75s cubic-bezier(1, 0, 0, 1) 1 forwards;
        animation: wrap 0.75s cubic-bezier(1, 0, 0, 1) 1 forwards;
        -webkit-transform: translateY(100%);
        transform: translateY(100%);
        -webkit-transform-origin: bottom;
        transform-origin: bottom;
    }

    @-webkit-keyframes wrap {
        to {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    }

    @keyframes wrap {
        to {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
    }

</style>

<h1>
    <span>4</span>
    <span>0</span>
    <span>3</span>
  </h1>
  <div class='chainwrap'>
    <div class='chain'></div>
    <div class='chain'></div>
    <div class='chain'></div>
    <div class='chain'></div>
    <div class='chain'></div>
    <div class='chain'></div>
  </div>
  