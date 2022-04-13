<?php
include "header.php";
include "database.php";

$artists = $db->query("SELECT * FROM artists");

?>


<?php if ($_SESSION["login_status"] != null && $_SESSION["login_status"] == true): ?>


    <div class="container">
        <h3 class="text-light">افزودن آلبوم جدید</h3>
        <hr class="text-light">

        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <?php include "admin_side.php"; ?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 mt-3 mt-lg-auto mt-md-3 mt-sm-3">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="admin_add_album_process.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label  class="form-label">نام آلبوم</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label  class="form-label">بارگذاری عکس</label>
                                <input type="file" name="image" class="form-control"  >
                            </div>

                            <div class="mb-3">
                                    <label  class="form-label">ایدی خواننده</label>
                                <select class="form-select" name="artists_id">
                                    <?php foreach ($artists as $artist): ?>
                                    <option  value="<?php echo $artist["id"]?>"><?php echo $artist["name"]?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">ذخیره</button>
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
