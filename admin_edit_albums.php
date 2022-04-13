<?php
include "header.php";
include "database.php";

$albums_id = $_GET["albums_id"];
$artist_id = $_GET["artist_id"];

$albums = $db->query("SELECT * FROM albums WHERE id = $albums_id")->fetch_assoc();

$artists_selected = $db->query("SELECT * FROM artists WHERE id = $artist_id")->fetch_assoc();

$artists = $db->query("SELECT * FROM artists");

?>


<?php if ($_SESSION["login_status"] != null && $_SESSION["login_status"] == true): ?>


    <div class="container">
        <h3 class="text-light">ویرایش آلبوم </h3>
        <hr class="text-light">

        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <?php include "admin_side.php"; ?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 mt-3 mt-lg-auto mt-md-3 mt-sm-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="admin_edit_albums_process.php" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-lg-7 col-md-6 col-sm-12 mb-3 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نام آلبوم</label>
                                    <input type="text" name="name" value="<?php echo $albums["name"]; ?>"
                                           class="form-control">
                                    <div class=" mt-3">
                                        <div>
                                            <label for="exampleInputPassword1" class="form-label">بارگذاری عکس</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label  class="form-label">نام خواننده</label>
                                        <select class="form-select" name="artists_id">
                                            <option value="<?php echo $artists_selected["id"]?>" > <?php echo $artists_selected["name"]?> </option>
                                            <?php foreach ($artists as $artist): ?>
                                                <?php if ( $artists_selected["id"] != $artist["id"]):?>
                                                <option  value="<?php echo $artist["id"]?>"><?php echo $artist["name"]?></option>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-12 offset-lg-1 ">

                                    <div class="mt-auto">
                                        <img src="<?php echo $albums["image"]; ?>"  class="img-fluid rounded-3">
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" value="<?php echo $albums["id"]; ?>" name="id">
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
