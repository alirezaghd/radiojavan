<?php
include "database.php";


?>

<div class="flex-shrink-0 p-3 bg-white rounded-2" >
    <a href="admin_dashboard.php" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <span class="fs-5 fw-semibold">داشبورد</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                صفحه اصلی
            </button>

        </li>
        <li class="mb-1">
            <div class="btn btn-toggle  align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                مدیریت محتوا
            </div>
            <div class="collapse" id="dashboard-collapse" style="">
                <div class="btn-toggle-nav   list-unstyled fw-normal pb-1 small">
                    <a href="admin_artists.php" class="list-group-item">خواننده ها</a>

                    <a href="admin_albums.php" class="list-group-item"> آلبوم ها </a>
                    <a href="admin_musics.php" class="list-group-item">آهنگ ها</a>

                </div>
            </div>
        </li>

    </ul>
</div>