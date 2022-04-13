<?php
include "header.php";
include "database.php";


$musics = $db->query("SELECT * FROM musics");
$i = 1;

?>


<?php if ($_SESSION["login_status"] != null && $_SESSION["login_status"] == true): ?>


    <div class="container">
        <h3 class="text-light">آهنگ ها</h3>
        <hr class="text-light">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <?php include "admin_side.php"; ?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12">
                <a href="admin_add_music.php" class="btn btn-success mt-2 mt-sm-3 mt-md-3 mt-lg-0"> <i class="fas fa-plus"></i></a>
                <br class="text-light">
                <div class="table-responsive">
                <table class="table list-table table-secondary table-nowrap align-middle table-borderless">
                    <thead>
                    <tr>
                        <th scope="col" style="width:50px;">#</th>
                        <th scope="col">عکس</th>

                        <th scope="col">نام آهنگ</th>
                        <th scope="col">فایل صوتی</th>

                        <th scope="col" style="width: 150px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($musics as $music): ?>
                        <tr class=" mt-2">
                            <th scope="row"> <?php echo $music["id"]; ?> </th>
                            <td>
                                <img src="<?php echo $music["image"]; ?>" class="img-fluid" width="80px">
                            </td>

                            <td><?php echo $music["name"]; ?></td>
                            <td>
                                <audio src="<?php echo $music["mp3"]; ?>" id="player" ></audio>
                                <div>

                                    <i onclick="document.getElementById('player').play()" class="btn btn-sm btn-outline-dark rounded-pill fas fa-play fa-sm"></i>
                                    <i onclick="document.getElementById('player').pause()" class=" btn btn-sm btn-outline-dark rounded-pill mt-lg-auto mt-md-auto mt-sm-auto mt-1 fas fa-pause fa-sm"></i>
                                </div>
                            </td>
                            <td class="text-center">
                                <a class="btn btn_size btn-outline-info"
                                   href="admin_edit_musics.php?musics_id=<?php echo $music["id"]; ?>&&album_id=<?php echo $music["album_id"];?>">

                                    <i class="fas fa-edit"></i>
                                </a>
                                <a class="btn btn_size btn-outline-danger mt-lg-auto mt-md-auto mt-sm-auto mt-1"
                                   href="admin_remove_musics.php?musics_id=<?php echo $music["id"]; ?>">
                                    <i class="fas fa-trash"></i>
                                </a>

                            </td>
                        </tr>
                    <?php endforeach ?>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

<?php else:
    header("Location: admin_login.php");
endif;
?>

<?php include "footer.php" ?>
