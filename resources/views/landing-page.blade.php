<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDAM Tirta Raharja</title>

    <!-- import css custome file -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/home.css">


</head>

<body>

    <!-- header section starts -->
    <header class="header">

        <div id="menu-btn" class="fa-solid fa-bars"></div>

        <a href="#" class="logo">PDAM<span></span></a>

        <!-- navbar section -->
        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#vehicles">Mobil</a>
            <a href="#services">Peminjaman</a>
            {{-- <a href="#reviews">reviews</a>
            <a href="#contact">contact</a> --}}
        </nav>

        <!-- login button -->
        <div id="login-btn">
            {{-- <button type="button" class="btn">login</button> --}}
            <i class="fa-regular fa-user"></i>
        </div>


    </header>
    <section class="home" id="home">

        <h1 class="home-parallax" data-speed="-2">Find your car</h1>
        <img class="home-parallax" data-speed="5" src="<?php echo url('/');?>/img/car0.png" alt="">
        <a href="#" class="btn home-parallax" data-speed="7">explore cars</a>

    </section>
    <!-- home section end -->


    <!-- icon section starts -->
    <section class="icons-container">

        <div class="icons">
            <i class="fa-solid fa-car"></i>
            <div class="content">
                <h3>3100+</h3>
                <p>cars sold</p>
            </div>
        </div>

        <div class="icons">
            <i class="fa-solid fa-users"></i>
            <div class="content">
                <h3>500+</h3>
                <p>happy clients</p>
            </div>
        </div>

        <div class="icons">
            <i class="fa-solid fa-car"></i>
            <div class="content">
                <h3>390+</h3>
                <p>new cars</p>
            </div>
        </div>

    </section>
    <section class="featured" id="featured">

        <h1 class="heading"><span>Mobil </span> Tersedia</h1>

        <div class="featured-slider">

            <div class="featured-wrapper">
                <div class="fa-solid fa-angle-left preNext" id="fPreBtn"></div>

                <div class="featured-wrapper2">
                    <div class="featured-wrapper-box">
                        @foreach ($mobils as $data)
                        <div class="box active">
                            <img src="<?php echo url('/');?>/img/car7.png" alt="">
                            <h3>{{$data->nama_mobil}}</h3>
                            <div class="price">{{$data->plat_nomor}}</div>
                            <div class="stars">
                                {{$data->status}}
                            </div>
                            <a href="#" class="btn">Pinjam</a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="fa-solid fa-angle-right preNext" id="fNextBtn"></div>
            </div>

            <div class="fActCircle">
                <div class="fa-regular fa-solid fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
                <div class="fa-regular fa-circle"></div>
            </div>

        </div>
    </section>
    <!-- font awsome link -->
    <script src="https://kit.fontawesome.com/ca9a6c5a17.js" crossorigin="anonymous"></script>

    <!-- import javascript custome file -->
    <script>
        let menubtn = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menubtn.onclick = () => {
    menubtn.classList.toggle('fa-xmark');
    navbar.classList.toggle('active');
}

document.querySelector('#login-btn').onclick = () => {
    document.querySelector('.login-form-container').classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () => {
    document.querySelector('.login-form-container').classList.remove('active');
}


window.onscroll = () => {

    if (window.scrollY > 0) {
        document.querySelector('.header').classList.add('active');
    } else {
        document.querySelector('header').classList.remove('active');
    }

    menubtn.classList.remove('fa-xmark');
    navbar.classList.remove('active');
}


document.querySelector('.home').onmousemove = (e) => {

    document.querySelectorAll('.home-parallax').forEach(element => {
        let speed = element.getAttribute('data-speed');

        let x = (window.innerWidth - e.pageX * speed) / 90;
        let y = (window.innerHeight - e.pageY * speed) / 90;

        element.style.transform = `translateX(${y}px) translateY(${x}px)`;

    });
};

document.querySelector('.home').onmouseleave = () => {

    document.querySelectorAll('.home-parallax').forEach(element => {

        element.style.transform = `translateX(0px) translateY(0px)`;

    });
};




let wrapper = document.querySelector('.wraper-box');
let activeBox = wrapper.querySelectorAll('.box');
let activeLable = document.querySelector('.activeCircle').querySelectorAll('.fa-circle')
let nextBtn = document.querySelector('#nextBtn');
let preBtn = document.querySelector('#preBtn');
let imgInd = 0;

nextBtn.onclick = ()=>{
    imgInd++;
    changeBox();
}

preBtn.onclick = ()=>{
    imgInd--;
    changeBox();
}

let changeBox = () =>{
    
    if(imgInd > activeBox.length - 1){
        imgInd = 0;
    } else if(imgInd < 0){
        imgInd = activeBox.length - 1;
    }

    for(let i = 0; i < activeBox.length; i++){
        if(i === imgInd){
            activeBox[i].classList.add('active');
            activeLable[i].classList.add('fa-solid');
            if(window.screen.width > 450){
                wrapper.style.transform = `translateX(${imgInd * -250}px)`;
            }
            
        } else{            
            activeBox[i].classList.remove('active');
            activeLable[i].classList.remove('fa-solid');
        }
    }
}





let fwrapper = document.querySelector('.featured-wrapper-box');
let fActBox = fwrapper.querySelectorAll('.box');
let FActLable = document.querySelector('.fActCircle').querySelectorAll('.fa-circle')
let fNextBtn = document.querySelector('#fNextBtn');
let fPreBtn = document.querySelector('#fPreBtn');

let fImgInd = 0;

fNextBtn.onclick = ()=>{
    fImgInd++;
    fChangeBox();
}

fPreBtn.onclick = ()=>{
    fImgInd--;
    fChangeBox();
}

let fChangeBox = () =>{
    
    if(fImgInd > fActBox.length - 1){
        fImgInd = 0;
    } else if(fImgInd < 0){
        fImgInd = fActBox.length - 1;
    }

    for(let i = 0; i < fActBox.length; i++){
        if(i === fImgInd){
            fActBox[i].classList.add('active');
            FActLable[i].classList.add('fa-solid');
            if(window.screen.width > 768){
                fwrapper.style.transform = `translateX(${fImgInd * -21}vw)`;
            }
            
        } else{            
            fActBox[i].classList.remove('active');
            FActLable[i].classList.remove('fa-solid');
        }
    }
}



let rWrapper = document.querySelector('.review-wrapper-box');
let rActBox = rWrapper.querySelectorAll('.box');
let rActLable = document.querySelector('.rActCircle').querySelectorAll('.fa-circle')
let rNextBtn = document.querySelector('#rNextBtn');
let rPreBtn = document.querySelector('#rPreBtn');

let rImgInd = 0;

rNextBtn.onclick = ()=>{
    rImgInd++;
    rChangeBox();
}

rPreBtn.onclick = ()=>{
    rImgInd--;
    rChangeBox();
}

let rChangeBox = () =>{
    
    if(rImgInd > rActBox.length - 1){
        rImgInd = 0;
    } else if(rImgInd < 0){
        rImgInd = rActBox.length - 1;
    }
    for(let i = 0; i < rActBox.length; i++){
        if(i === rImgInd){
            rActBox[i].classList.add('active');
            rActLable[i].classList.add('fa-solid');
            if(window.screen.width > 768){
                rWrapper.style.transform = `translateX(${rImgInd * -20}vw)`;
            }  
        } else{            
            rActBox[i].classList.remove('active');
            rActLable[i].classList.remove('fa-solid');
        }
    }
}

    </script>
</body>

</html>