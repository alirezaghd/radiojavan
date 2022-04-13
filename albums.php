<?php
include "header.php";
include "database.php";


$artist_id = $_GET["artist"];

$albums = $db->query("SELECT * FROM albums WHERE artist_id = $artist_id ");
$artist = $db->query("SELECT * FROM artists WHERE id = $artist_id")->fetch_assoc();

?>

<div class="container">
    <div class="row mt-3">
        <h4 class="text-light">  آلبوم های
             <?php echo $artist["name"]?>
        </h4>
        <hr class="text-light">


        <?php if($albums->num_rows == 0): ?>
            <div class="alert alert-danger" role="alert">
    هنوز آلبوم های این خواننده به سایت اضافه نشده است
            </div>
        <?php else: ?>

            <?php foreach ($albums as $album):?>
                <div class="col-lg-2 col-md-6 col-sm-10">
                    <a href="music.php?album=<?php echo $album["id"]?>" class="text-decoration-none link-dark">
                        <div class="card card_hovar mt-4">
                            <img src="<?php echo $album["image"] ?>" class="card-img-top" alt="<?php echo $album["name"] ?>">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo $album["name"] ?></h6>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>


    </div>
</div>









<?php include "footer.php" ?>
