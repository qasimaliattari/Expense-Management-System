<?php
include ('config.php');
include ('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- PAGE TITLE HERE -->
    <title>EMS_Dashboard</title>
    <!-- Style css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="css/style1.css" rel="stylesheet" />
    <link href="css/table.css" rel="stylesheet" />
    
  </head>
  <body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
      <!--**********************************
            Nav header start
        ***********************************-->
      <div class="nav-header">
        <a href="index.html" class="brand-logo">
          <svg class="logo-abbr" width="53" height="53" viewBox="0 0 53 53">
            <path
              class="svg-logo-primary-path"
              d="M48.3418 41.8457H41.0957C36.8148 41.8457 33.332 38.3629 33.332 34.082C33.332 29.8011 36.8148 26.3184 41.0957 26.3184H48.3418V19.2275C48.3418 16.9408 46.4879 15.0869 44.2012 15.0869H4.14062C1.85386 15.0869 0 16.9408 0 19.2275V48.8594C0 51.1462 1.85386 53 4.14062 53H44.2012C46.4879 53 48.3418 51.1462 48.3418 48.8594V41.8457Z"
              fill="#5BCFC5"
            />
            <path
              class="svg-logo-primary-path"
              d="M51.4473 29.4238H41.0957C38.5272 29.4238 36.4375 31.5135 36.4375 34.082C36.4375 36.6506 38.5272 38.7402 41.0957 38.7402H51.4473C52.3034 38.7402 53 38.0437 53 37.1875V30.9766C53 30.1204 52.3034 29.4238 51.4473 29.4238ZM41.0957 35.6348C40.2382 35.6348 39.543 34.9396 39.543 34.082C39.543 33.2245 40.2382 32.5293 41.0957 32.5293C41.9532 32.5293 42.6484 33.2245 42.6484 34.082C42.6484 34.9396 41.9532 35.6348 41.0957 35.6348Z"
              fill="#5BCFC5"
            />
          </svg>

          <p
            class="brand-title"
            width="124px"
            height="33px"
            style="font-size: 30px"
          >
            Admin
          </p>
        </a>
        <div class="nav-control">
          <div class="hamburger">
            <span class="line"></span><span class="line"></span
            ><span class="line"></span>
          </div>
        </div>
      </div>
      <!--**********************************
            Nav header end
        ***********************************-->

      <!--**********************************
            Sidebar start
        ***********************************-->
      <div class="dlabnav">
        <div class="dlabnav-scroll">
          <ul class="metismenu" id="menu">
            <li class="dropdown header-profile">
              <a
                class="nav-link"
                href="javascript:void(0);"
                role="button"
                data-bs-toggle="dropdown"
              >
                <img src="images/ion/man (1).png" width="20" alt="" />
                <div class="header-info ms-3">
                  <span class="font-w600">Hi,<b>QASIM ALI</b></span>
                  <small class="text-end font-w400">qasimaly18@gmail.com</small>
                </div>
              </a>
            </li>
            <li>
              <a href="dashboard.php" aria-expanded="false">
                <i class="flaticon-025-dashboard"></i>
                <span class="nav-text">Dashboard</span>
              </a>
            </li>
            <li>
              <a href="category.php" aria-expanded="false">
                <i class="fa-regular fa-rectangle-list"></i>
                <span class="nav-text">Category</span>
              </a>
            </li>
            <li>
              <a href="expense.php" aria-expanded="false">
                <i class="fa-solid fa-wallet"></i>
                <span class="nav-text">Expense</span>
              </a>
            </li>
            <!-- <li><a href="javascript:void()" aria-expanded="false">
							<i class="flaticon-086-star"></i>
							<span class="nav-text"></span>
						</a>
                    </li> -->
            <li>
              <a href="logout.php" aria-expanded="false">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="nav-text">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!--**********************************
            Sidebar end
        ***********************************-->
    </div>
  </body>
</html>
