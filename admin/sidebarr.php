<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="sidebarr.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>ADMIN PANEL</title>
   </head>
<body>
  <div class="sidebar close">
    <div class="logo-details">
    <i class='bx bxl-medium-square'></i>
      <span class="logo_name">MACF</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="adminpage.php" >
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">DASHBOARD</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="adminpage.php">DASHBOARD</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a>
          <i class='bx bxs-parking'></i>
            <span class="link_name">PRODUCTS</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name">PRODUCTS</a></li>
          <li><a href="insert.php">ADD</a></li>
          <li><a href="display.php">MANAGE</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a>
          <i class='bx bxl-opera'></i>
            <span class="link_name">ORDERS</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name">ORDERS</a></li>
          <li><a href="neworder.php">NEW ORDERS</a></li>
          <li><a href="acceptedorder.php">ACCEPTED ORDERS</a></li>
          <li><a href="onway.php">ORDERS ON THE WAY</a></li>
          <li><a href="cancelled.php">CANCELLED ORDERS</a></li>
          <li><a href="delivered.php">DELIVERED ORDERS</a></li>
          <li><a href="allorder.php">ALL ORDERS</a></li>
        </ul>
      </li>
      <li>
        <a href="users.php" >
        <i class='bx bx-user-circle'></i>
          <span class="link_name">CUSTOMERS</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="users.php">CUSTOMERS</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a >
            <i class='bx bx-plug' ></i>
            <span class="link_name">STOCK</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" >STOCK</a></li>
          <li><a href="inventory.php">ADD</a></li>
          <li><a href="inventories.php">MANAGE</a></li>
        </ul>
      </li>
      <li>
        <a href="purchaserep.php">
        <i class='bx bx-line-chart' ></i>
          <span class="link_name">PURCHASE REPORT</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="purchaserep.php">PURCHASE REPORT</a></li>
        </ul>
      </li>
      <li>
        <a href="salesreport.php">
        <i class='bx bxs-report'></i>
          <span class="link_name">SALES REPORT</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="salesreport.php">SALES REPORT</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
      <img src="images/aaa.jpg" alt="profileImg">
        </div>
      <div class="name-job">
        <div class="profile_name">ABEL SUNNY</div>
        <div class="job">Web Desginer</div>
      </div>
      <a href="logoutt.php">
      <i class='bx bx-log-out' ></i>
      </a>
    </div>
  </li>
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text"></span>
    </div>
  </section>
  <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script>
</body>
</html>
</body>
</html>