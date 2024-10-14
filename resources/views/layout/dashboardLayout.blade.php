<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DashboardAdmin</title>
  <link rel="stylesheet" href="<?php echo url('/');?>/css/dashboard.css">
  {{-- <link rel="{{asset('assets/css/bootsrtap.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}"> --}}
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="fa-solid fa-house-flood-water"></i>
      <span class="logo_name">Dashboard</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="/mobil">
          <i class="fa-solid fa-car"></i>
          <span class="link_name">Kendaraan</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Kendaraan</a></li>
        </ul>
      </li>
      <li>
        <a href="/user">
        <i class='bx bxs-user'></i>
          <span class="link_name">Karyawan</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Karyawan</a></li>
        </ul>
      </li>
      <li>
        <a href="/petugas">
          <i class="fa-solid fa-user-nurse"></i>
          <span class="link_name">Petugas</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Petugas</a></li>
        </ul>
      </li>
      <li>
        <a href="/peminjaman">
          <i class="fa-solid fa-clipboard"></i>
          <span class="link_name">Peminjaman</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Peminjaman</a></li>
        </ul>
      </li>
      <li>
      <div class="icon-link">
        <a href="#">
          <i class='bx bx-cog'></i>
          <span class="link_name">Pengaturan</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu"> 
          <li><a class="link_name" href="#">Pengaturan</a></li>
          {{-- <li><a href="/profile"><i class='bx bxs-user-circle'></i>Profile</a></li> --}}
          <li><a href="/logout" onclick="return confirm('Anda Yakin?')" ><i class='bx bx-log-out'></i>Keluar</a></li>
        </ul>
      </li> 
    </ul>
  </div>
  <section class="home-section">
    @yield('content')
  </section>
  <script>
    const arrows = document.querySelectorAll(".arrow");

arrows.forEach((arrow) => {
  arrow.addEventListener("click", (e) => {
    const arrowParent = e.target.closest(".arrow").parentElement.parentElement;
    arrowParent.classList.toggle("showMenu");
  });
});

const sidebar = document.querySelector(".sidebar");
const sidebarBtn = document.querySelector(".bx-menu");

sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

  </script>
</body>
</html>
<!-- <div class="home-content">
      <i class='bx bx-menu'></i>
    </div> -->
    <!-- <div class="icon-link">
          <a href="#">
            <i class='bx bx-plug'></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div> -->
        <!-- <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li> -->
<!-- <li>
         <div class="icon-link">
          <a href="/tuser">
            <i class='bx bx-collection'></i>
            <span class="link_name">Category</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Category</a></li>
          <li><a href="#">HTML & CSS</a></li>
          <li><a href="#">JavaScript</a></li>
          <li><a href="#">PHP & MySQL</a></li>
        </ul>
      </li> 
      <li> -->
        <!-- <div class="icon-link">
          <a href="#">
            <i class='bx bx-book-alt'></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow'></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Posts</a></li>
          <li><a href="#">Web Design</a></li>
          <li><a href="#">Login Form</a></li>
          <li><a href="#">Card Design</a></li>
        </ul>
      </li> -->