<?php
include "header.php";
include "database.php";


$albums = $db->query("SELECT * FROM albums");

$i = 1;

?>


<?php if ($_SESSION["login_status"] != null && $_SESSION["login_status"] == true): ?>


    <div class="container">
        <h3 class="text-light">آلبوم ها</h3>
        <hr class="text-light">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <?php include "admin_side.php"; ?>
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12">
                <a href="admin_add_album.php" class="btn btn-success mt-2 mt-sm-3 mt-md-3 mt-lg-0"> <i class="fas fa-plus"></i></a>
                <br class="text-light">
                <div class="table-responsive">
                <table class="table list-table table-secondary table-nowrap align-middle table-borderless rounded-3">
                    <thead>
                    <tr>
                        <th scope="col" style="width:50px;">#</th>
                        <th scope="col">عکس</th>
                        <th scope="col">نام</th>
                        <th scope="col">  نام خواننده</th>
                        <th scope="col" style="width: 150px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($albums as $album): ?>
                        <tr class=" mt-2">
                            <th scope="row"> <?php echo $i++; ?> </th>
                            <td>
                                <img src="<?php echo $album["image"]; ?>" class="img-fluid" width="80px">

                            </td>
                            <td><?php echo $album["name"]; ?></td>
                            <td>
                                <?php echo $album["artist_id"]; ?>
                            </td>

                            <td>

                                <a class="btn btn_size btn-outline-info "
                                   href="admin_edit_albums.php?albums_id=<?php echo $album["id"];?>&&artist_id=<?php echo $album["artist_id"];?>">

                                    <i class="fas fa-edit "></i>

                                </a>
                                <a class="btn btn_size btn-outline-danger mt-lg-auto mt-md-auto mt-sm-auto mt-1"
                                   href="admin_remove_albums.php?albums_id=<?php echo $album["id"]; ?>">
                                    <i class="fas fa-trash "></i>
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
