<?php
include "header.php";
include "database.php";

$artist_id = $_GET["artist_id"];
$artists = $db->query("SELECT * FROM artists WHERE id = $artist_id")->fetch_assoc();
?>


<?php if ($_SESSION["login_status"] != null && $_SESSION["login_status"] == true): ?>


    <div class="container">
        <h3 class="text-light">ویرایش خواننده </h3>
        <hr class="text-light">

        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <?php include "admin_side.php"; ?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 mt-3 mt-lg-auto mt-md-3 mt-sm-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="admin_edit_artists_process.php" enctype="multipart/form-data">
                            <div class="row ">
                                <div class="col-7 mb-3">
                                    <label for="exampleInputEmail1" class="form-label">نام خواننده</label>
                                    <input type="text" name="name" value="<?php echo $artists["name"]; ?>"
                                           class="form-control">
                                    <div class=" mt-3">
                                        <div>
                                            <label for="exampleInputPassword1" class="form-label">بارگذاری عکس</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3 offset-1 ">


                                    <div class="mt-auto">
                                        <img src="<?php echo $artists["image"]; ?>"  class="img-fluid rounded-3">
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" value="<?php echo $artists["id"]; ?>" name="id">
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
