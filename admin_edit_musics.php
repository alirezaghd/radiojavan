<?php
include "header.php";
include "database.php";

$musics_id = $_GET["musics_id"];
$albums_id = $_GET["album_id"];

$musics = $db->query("SELECT * FROM musics WHERE id = $musics_id")->fetch_assoc();

$albums_selected = $db->query("SELECT * FROM albums WHERE id = $albums_id")->fetch_assoc();

$albums = $db->query("SELECT * FROM albums");

?>


<?php if ($_SESSION["login_status"] != null && $_SESSION["login_status"] == true): ?>


    <div class="container">
        <h3 class="text-light">ویرایش آهنگ </h3>
        <hr class="text-light">

        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <?php include "admin_side.php"; ?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 mt-3 mt-lg-auto mt-md-3 mt-sm-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="admin_edit_musics_process.php" enctype="multipart/form-data">
                            <div class="row ">

                                <div class="col-lg-7 col-md-6 col-sm-12 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نام آهنگ</label>
                                    <input type="text" name="name" value="<?php echo $musics["name"]; ?>"
                                           class="form-control">
                                    <div class=" mt-3">
                                        <div>
                                            <label for="exampleInputPassword1" class="form-label">بارگذاری عکس</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">بارگذاری mp3</label>
                                        <input type="file" name="mp3" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">نام آلبوم</label>
                                        <select class="form-select" name="albums_id">
                                            <option value="<?php echo $albums_selected["id"] ?>"><?php echo $albums_selected["name"] ?></option>

                                            <?php foreach ($albums as $album): ?>
                                                <?php if ( $albums_selected["id"] != $album["id"]):?>

                                                    <option value="<?php echo $album["id"] ?>"><?php echo $album["name"] ?></option>
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-12 offset-lg-1 ">
                                    <div class="mt-5">
                                        <img src="<?php echo $musics["image"]; ?>"  class="img-fluid rounded-3">
                                    </div>
                                </div>

                            </div>


                            <input type="hidden" value="<?php echo $musics["id"]; ?>" name="id">
                            <button type="submit" class="btn btn-primary mt-3">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else:
    header("Location: admin_login.php");
endif;
?>

<?php include "footer.php" ?>
