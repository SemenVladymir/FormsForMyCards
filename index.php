<?php
include 'Models/CardWithPhone.php';
if(isset($_POST["submit"]))
{
        $newCard = new CardWithPhone($_POST["title"], $_POST["text"], $_POST["createdate"], $_POST["phone"]);
        if($file=fopen("data.json", "r") or die("FAILURE")) {
            $fdata = fread($file, filesize("data.json"));
            $data = json_decode($fdata);
            fclose($file);
            $file = fopen("data.json", "w") or die("FAILURE");
            $data[] = $newCard;
            fwrite($file, json_encode($data));
            fclose($file);
            if (isset($_POST["redstyle"]))
                $isred=true;
            else
                $isred=false;
            view($data, $isred);
        }
}
else
{
    if($myFile = fopen("data.json", "r") or die("FAILURE")) {
        $fdata = fread($myFile, filesize("data.json"));
        $data = json_decode($fdata);
        fclose($myFile);
        view($data, false);
    }
}

function view($arr, $red) : void
{
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <style>
        body{
            <?php
            if ($red)
                echo "background: #FDE6FCFF;";
            else
                echo "background: #e6f4fd;";
            ?>
        }
        .wrapper {
            display: grid;
            grid-template-columns: 25% 25% 25% 25%;
        }
        .wrapper div {
            text-align: center;
        <?php
        if ($red)
            echo "background: #f5a1ad;";
        else
            echo "background: #c7f8e0;";
        ?>
            box-shadow: 5px 3px 6px 3px rgb(128, 128, 128);
            margin: 10px;
            border: 1px solid #9d959d;
        }
        .card-header{
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="card-header">My cards</h1>

<?php
    echo "<div class='wrapper'>";
    foreach ($arr as $item){
        echo "<div>";
        echo "<p><h2>$item->title</h2></p>";
        if ($item->text!="")
            echo "<p><b>Description:</b> $item->text</p>";
        else
            echo "<p>$item->text</p>";
        if ($item->createDate!="")
            echo "<p><b>Date:</b> $item->createDate</p>";
        else
            echo "<p>$item->createDate</p>";
        if ($item->phone!="")
            echo "<p><b>Phone:</b> $item->phone</p>";
        else
            echo "<p>$item->phone</p>";
        echo "</div>";
    }unset($item);
    echo "</div>";
    echo "</body>";
    echo "</html>";
}
